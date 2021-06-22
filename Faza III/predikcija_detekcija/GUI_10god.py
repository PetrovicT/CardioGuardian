import sys, torch
from PyQt5.QtWidgets import *  # koristim Python PyQT5
from PyQt5.QtCore import *
from PyQt5.QtGui import *
from pomocni import opcije  # za ispis pol, godina ...
from Trening_10god import LinearModel


class AnotherWindow(QWidget):
    def __init__(self, rez):
        super().__init__()
        self.setWindowTitle("Rezultat predikcije")
        self.setWindowIcon(QIcon('./imgs/cardioguardian.png'))
        self.setGeometry(100, 100, 450, 50)
        layout = QVBoxLayout()  # po y osi se redjaju widgeti u layout
        out_list = ['Nema predispozicije', 'Ima predispozicije']
        self.label = QLabel("Predvidjeno - {}".format(out_list[rez]))
        self.label.setFont(QFont('Arial', 10))
        layout.addWidget(self.label)
        self.setLayout(layout)


class CustomMainWindow(QMainWindow):
    EXIT_CODE_REBOOT = -123
    def __init__(self):
        super(CustomMainWindow, self).__init__()

        self.setWindowTitle("Testiranje")
        self.setWindowIcon(QIcon('./imgs/cardioguardian.png'))
        self.setGeometry(100, 100, 550, 650)

        self.widget = QWidget()
        self.LAYOUT_A = QGridLayout()
        self.scroll = QScrollArea()
        self.input_table()

        self.start = QPushButton('Pokreni')
        self.start.clicked.connect(self.onStart)   # pocinje da se izvrsava onStart koji zapravo poziva f-ju predvidi
        self.LAYOUT_A.addWidget(self.start, *(100, 10))  # dugme se iscrtava i gde se iscrtava - zelimo ispod unosa sa desne strane

        self.widget.setLayout(self.LAYOUT_A)

        self.scroll.setVerticalScrollBarPolicy(Qt.ScrollBarAlwaysOn)  # ako je ekran mali skrol bar
        self.scroll.setWidgetResizable(True)    # mozemo da menjamo dimenzije prozora
        self.scroll.setWidget(self.widget)
        self.setCentralWidget(self.scroll)
        self.statusBar().showMessage('Molimo unesite sve vrednosti i pritisnite "Pokreni"')
        self.show()
        return

    # najbitniji deo
    def predvidi(self, polVrednost, godineVrednost, pusacVrednost, cigNaDanVrednost,
                 BPMedsVrednost, prethodniUdarVrednost, hipertenzijaVrednost,
                 diabetesVrednost, totalHolesterolVrednost, krvnipritisakGVrednost, krvnipritisakDVrednost,
                 bmiVrednost, brOtkSrcaVrednost, glukozaVrednost, skolaVrednost):

        inputs = torch.tensor([polVrednost, godineVrednost,
                               pusacVrednost, cigNaDanVrednost,
                               BPMedsVrednost,
                               prethodniUdarVrednost, hipertenzijaVrednost,
                               diabetesVrednost, totalHolesterolVrednost,
                               krvnipritisakGVrednost, krvnipritisakDVrednost,
                               bmiVrednost, brOtkSrcaVrednost, glukozaVrednost,
                               skolaVrednost+1])

        # skolaVrednost+1 zato sto ide od 1, a ne od 0 u nasem .csv

        ###
        model_number = 10
        loading_path = './model/Model_{}god'.format(model_number)
        ###

        device = torch.device('cpu')
        model = LinearModel(input_dim=15)  # imamo 15 atributa

        # restore
        model.load_state_dict(torch.load(loading_path + '.pth'), strict=False)
        model.to(device)
        print("Koristi se: ", device)

        out = model(inputs)  # dobijen rezultat na osnovu unetih inputs
        rezultat = 1 if out[1] > out[0] else 0  # one hot encoding, znaci radi se o klasi 1 ako je drugi izlaz veci od prvog
        # ako je prvi izlaz veci od drugog onda se radi o klasi 0

        self.w = AnotherWindow(rezultat)  # ispisi rezultat na novom prozoru
        self.w.show()

    def onStart(self):    # kada se pritisne dugme pokreni samo pozovi predvidi i prosledi parametre

        self.predvidi(self.polVrednost.currentIndex(), self.godineVrednost.value(),
                       self.pusacVrednost.currentIndex(), self.cigNaDanVrednost.value(),
                       self.BPMedsVrednost.currentIndex(),
                       self.prethodniUdarVrednost.currentIndex(), self.hipertenzijaVrednost.currentIndex(),
                       self.diabetesVrednost.currentIndex(), self.totalHolesterolVrednost.value(),
                       self.krvnipritisakGVrednost.value(), self.krvnipritisakDVrednost.value(),
                       self.bmiVrednost.value(), self.brOtkSrcaVrednost.value(), self.glukozaVrednost.value(),
                       self.skolaVrednost.currentIndex())


    def input_table(self):
        self.label1 = QLabel("    Molimo popunite formular")
        self.label1.setFont(QFont('Arial', 14))
        self.LAYOUT_A.addWidget(self.label1, *(9, 5))

        self.label3 = QLabel("Pol:")
        self.LAYOUT_A.addWidget(self.label3, *(10, 5))
        self.polVrednost = QComboBox()   # comboBox je kao select i option u html
        self.polVrednost.addItems(opcije.pol)  # ovo se ucita iz pomocni pa opcije.py
        self.LAYOUT_A.addWidget(self.polVrednost, *(10, 10))

        self.label4 = QLabel("Godine:")
        self.LAYOUT_A.addWidget(self.label4, *(15, 5))
        self.godineVrednost = QSpinBox()
        self.LAYOUT_A.addWidget(self.godineVrednost, *(15, 10))

        self.label5 = QLabel("Da li ste pusac?:")
        self.LAYOUT_A.addWidget(self.label5, *(20, 5))
        self.pusacVrednost = QComboBox()
        self.pusacVrednost.addItems(opcije.pusac)
        self.LAYOUT_A.addWidget(self.pusacVrednost, *(20, 10))

        self.label6 = QLabel("Broj cigareta na dan:")
        self.LAYOUT_A.addWidget(self.label6, *(25, 5))   # 5 je pomeraj na x osi, da li ce biti levo ili desno
        # zato je 5 leva kolona, a 10 desna, a 25 je na y osi, sto je manji broj to je pri vrhu
        self.cigNaDanVrednost = QSpinBox()
        self.LAYOUT_A.addWidget(self.cigNaDanVrednost, *(25, 10))

        self.label7 = QLabel("Da li koristite lekove za \nregulaciju krvnog pritiska?:")
        self.LAYOUT_A.addWidget(self.label7, *(30, 5))
        self.BPMedsVrednost = QComboBox()
        self.BPMedsVrednost.addItems(opcije.BPMeds)
        self.LAYOUT_A.addWidget(self.BPMedsVrednost, *(30, 10))

        self.label8 = QLabel("Da li ste ranije imali \nudar?:")
        self.LAYOUT_A.addWidget(self.label8, *(35, 5))
        self.prethodniUdarVrednost = QComboBox()
        self.prethodniUdarVrednost.addItems(opcije.prethodniUdar)
        self.LAYOUT_A.addWidget(self.prethodniUdarVrednost, *(35, 10))

        self.label9 = QLabel("Da li imate hipertenziju?:")
        self.LAYOUT_A.addWidget(self.label9, *(40, 5))
        self.hipertenzijaVrednost = QComboBox()
        self.hipertenzijaVrednost.addItems(opcije.hipertenzija)
        self.LAYOUT_A.addWidget(self.hipertenzijaVrednost, *(40, 10))

        self.label10 = QLabel("Da li imate dijabetes?:")
        self.LAYOUT_A.addWidget(self.label10, *(45, 5))
        self.diabetesVrednost = QComboBox()
        self.diabetesVrednost.addItems(opcije.diabetes)
        self.LAYOUT_A.addWidget(self.diabetesVrednost, *(45, 10))

        self.label12 = QLabel("Ukupan nivo holesterola:")
        self.LAYOUT_A.addWidget(self.label12, *(50, 5))
        self.totalHolesterolVrednost = QSpinBox()
        self.LAYOUT_A.addWidget(self.totalHolesterolVrednost, *(50, 10))

        self.label13 = QLabel("Gornji krvni pritisak:")
        self.LAYOUT_A.addWidget(self.label13, *(55, 5))
        self.krvnipritisakGVrednost = QDoubleSpinBox()
        self.krvnipritisakGVrednost.setMaximum(500)
        self.krvnipritisakGVrednost.setDecimals(1)
        self.LAYOUT_A.addWidget(self.krvnipritisakGVrednost, *(55, 10))

        self.label14 = QLabel("Donji krvni pritisak:")
        self.LAYOUT_A.addWidget(self.label14, *(60, 5))
        self.krvnipritisakDVrednost = QDoubleSpinBox()
        self.krvnipritisakDVrednost.setDecimals(1)
        self.krvnipritisakDVrednost.setMaximum(500)
        self.LAYOUT_A.addWidget(self.krvnipritisakDVrednost, *(60, 10))

        self.label15 = QLabel("BMI:")
        self.LAYOUT_A.addWidget(self.label15, *(65, 5))
        self.bmiVrednost = QDoubleSpinBox()
        self.bmiVrednost.setDecimals(2)
        self.bmiVrednost.setMaximum(100)
        self.LAYOUT_A.addWidget(self.bmiVrednost, *(65, 10))

        self.label16 = QLabel("Broj otkucaja srca:")
        self.LAYOUT_A.addWidget(self.label16, *(70, 5))
        self.brOtkSrcaVrednost = QSpinBox()
        self.brOtkSrcaVrednost.setMaximum(150)
        self.LAYOUT_A.addWidget(self.brOtkSrcaVrednost, *(70, 10))

        self.label17 = QLabel("Nivo glukoze u krvi:")
        self.LAYOUT_A.addWidget(self.label17, *(75, 5))
        self.glukozaVrednost = QSpinBox()
        self.LAYOUT_A.addWidget(self.glukozaVrednost, *(75, 10))

        self.label18 = QLabel("Skolovanje:")
        self.LAYOUT_A.addWidget(self.label18, *(80, 5))
        self.skolaVrednost = QComboBox()
        self.skolaVrednost.addItems(opcije.skola)
        self.LAYOUT_A.addWidget(self.skolaVrednost, *(80, 10))


if __name__ == '__main__':
    app = QApplication(sys.argv)
    QApplication.setStyle(QStyleFactory.create('Plastique'))
    myGUI = CustomMainWindow()
    currentExitCode = app.exec_()
