import sys, torch
from PyQt5.QtWidgets import *  # koristim Python PyQT5
from PyQt5.QtCore import *
from PyQt5.QtGui import *
from pomocni import opcije_prisustvo
from Trening_prisustvo import LinearModel


class AnotherWindow(QWidget):
    def __init__(self, rez):
        super().__init__()
        self.setWindowTitle("Rezultat predikcije")
        self.setWindowIcon(QIcon('./imgs/cardioguardian.png'))
        self.setGeometry(100, 100, 450, 50)
        layout = QVBoxLayout()  # po y osi se redjaju widgeti u layout
        out_list = ['Nije bolestan', 'Jeste bolestan']
        self.label = QLabel("Prisustvo bolesti - {}".format(out_list[rez]))
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
    def predvidi(self, godineVrednost, polVrednost, bolUGrudimaVrednost, krvniPritisakMirovanje,
                 holesterolVrednost, fastingSecerUKrviVrednost, ecgMirovanjeVrednost,
                 maxOtkucajaSrcaVrednost, bolPrilikomTreningaVrednost, oldpeakVrednost, STslopeVrednost):

        inputs = torch.tensor([godineVrednost, polVrednost,
                               bolUGrudimaVrednost, krvniPritisakMirovanje,
                               holesterolVrednost,
                               fastingSecerUKrviVrednost, ecgMirovanjeVrednost,
                               maxOtkucajaSrcaVrednost, bolPrilikomTreningaVrednost,
                               oldpeakVrednost, STslopeVrednost])

        ###
        model_number = 'sada'
        loading_path = './model/Model_{}'.format(model_number)
        ###

        device = torch.device('cpu')
        model = LinearModel(input_dim=11)  # imamo 11 atributa

        # restore
        model.load_state_dict(torch.load(loading_path + '.pth'), strict=False)

        model.to(device)
        print("Koristi se: ", device)

        out = model(inputs.float())
        rezultat = 1 if out[1] > out[0] else 0  # one hot encoding, znaci radi se o klasi 1 ako je drugi izlaz veci od prvog
        # ako je prvi izlaz veci od drugog onda se radi o klasi 0

        self.w = AnotherWindow(rezultat)  # ispisi rezultat na novom prozoru
        self.w.show()

    def onStart(self):    # kada se pritisne dugme pokreni samo pozovi predvidi i prosledi parametre

        self.predvidi(self.godineVrednost.value(), self.polVrednost.currentIndex(),
                      self.bolUGrudimaVrednost.value(), self.krvniPritisakMirovanje.value(),
                      self.holesterolVrednost.value(), self.fastingSecerUKrviVrednost.currentIndex(), self.ecgMirovanjeVrednost.currentIndex(),
                      self.maxOtkucajaSrcaVrednost.value(), self.bolPrilikomTreningaVrednost.currentIndex(), self.oldpeakVrednost.value(), self.STslopeVrednost.value())

    def input_table(self):
        self.label1 = QLabel("    Molimo popunite formular")
        self.label1.setFont(QFont('Arial', 14))
        self.LAYOUT_A.addWidget(self.label1, *(9, 5))

        self.label4 = QLabel("Godine:")
        self.LAYOUT_A.addWidget(self.label4, *(10, 5))
        self.godineVrednost = QSpinBox()
        self.godineVrednost.setMaximum(200)
        self.godineVrednost.setMinimum(1)
        self.LAYOUT_A.addWidget(self.godineVrednost, *(10, 10))

        self.label3 = QLabel("Pol:")
        self.LAYOUT_A.addWidget(self.label3, *(15, 5))
        self.polVrednost = QComboBox()   # comboBox je kao select i option u html
        self.polVrednost.addItems(opcije_prisustvo.pol)  # ovo se ucita iz pomocni pa opcije_prisustvo.py
        self.LAYOUT_A.addWidget(self.polVrednost, *(15, 10))

        self.label5 = QLabel("Koliko jak bol u grudima osecate (na skali od 1 do 4)?:")
        self.LAYOUT_A.addWidget(self.label5, *(20, 5))
        self.bolUGrudimaVrednost = QSpinBox()
        self.bolUGrudimaVrednost.setMaximum(4)
        self.bolUGrudimaVrednost.setMinimum(1)
        self.LAYOUT_A.addWidget(self.bolUGrudimaVrednost, *(20, 10))

        self.label6 = QLabel("Koliki Vam je krvni pritisak u mirovanju:")
        self.LAYOUT_A.addWidget(self.label6, *(25, 5))   # 5 je pomeraj na x osi, da li ce biti levo ili desno
        # zato je 5 leva kolona, a 10 desna, a 25 je na y osi, sto je manji broj to je pri vrhu
        self.krvniPritisakMirovanje = QSpinBox()
        self.krvniPritisakMirovanje.setMaximum(500)
        self.krvniPritisakMirovanje.setMinimum(1)
        self.LAYOUT_A.addWidget(self.krvniPritisakMirovanje, *(25, 10))

        self.label7 = QLabel("Unesite nivo holesterola:")
        self.LAYOUT_A.addWidget(self.label7, *(30, 5))
        self.holesterolVrednost = QSpinBox()
        self.holesterolVrednost.setMaximum(500)
        self.holesterolVrednost.setMinimum(1)
        self.LAYOUT_A.addWidget(self.holesterolVrednost, *(30, 10))

        self.label8 = QLabel("Fasting nivo secera u krvi:")
        self.LAYOUT_A.addWidget(self.label8, *(35, 5))
        self.fastingSecerUKrviVrednost = QComboBox()
        self.fastingSecerUKrviVrednost.addItems(opcije_prisustvo.fastingSecerUKrviVrednost)
        self.LAYOUT_A.addWidget(self.fastingSecerUKrviVrednost, *(35, 10))

        self.label9 = QLabel("Da li vam je dobar ECG u mirovanju?")
        self.LAYOUT_A.addWidget(self.label9, *(40, 5))
        self.ecgMirovanjeVrednost = QComboBox()
        self.ecgMirovanjeVrednost.addItems(opcije_prisustvo.ecgMirovanjeVrednost)
        self.LAYOUT_A.addWidget(self.ecgMirovanjeVrednost, *(40, 10))

        self.label10 = QLabel("Max broj otkucaja srca?:")
        self.LAYOUT_A.addWidget(self.label10, *(45, 5))
        self.maxOtkucajaSrcaVrednost = QSpinBox()
        self.maxOtkucajaSrcaVrednost.setMaximum(350)
        self.maxOtkucajaSrcaVrednost.setMinimum(1)
        self.LAYOUT_A.addWidget(self.maxOtkucajaSrcaVrednost, *(45, 10))

        self.label12 = QLabel("Da li osecate bol kada trenirate?")
        self.LAYOUT_A.addWidget(self.label12, *(50, 5))
        self.bolPrilikomTreningaVrednost = QComboBox()
        self.bolPrilikomTreningaVrednost.addItems(opcije_prisustvo.bolPrilikomTreningaVrednost)
        self.LAYOUT_A.addWidget(self.bolPrilikomTreningaVrednost, *(50, 10))

        self.label13 = QLabel("Unesite vrednost OldPeak-a:")
        self.LAYOUT_A.addWidget(self.label13, *(55, 5))
        self.oldpeakVrednost = QDoubleSpinBox()
        self.oldpeakVrednost.setMaximum(4)
        self.oldpeakVrednost.setMinimum(0)
        self.LAYOUT_A.addWidget(self.oldpeakVrednost, *(55, 10))

        self.label14 = QLabel("Unesite vrednost ST slope:")
        self.LAYOUT_A.addWidget(self.label14, *(60, 5))
        self.STslopeVrednost = QSpinBox()
        self.STslopeVrednost.setMaximum(3)
        self.STslopeVrednost.setMinimum(0)
        self.LAYOUT_A.addWidget(self.STslopeVrednost, *(60, 10))


if __name__ == '__main__':
    app2 = QApplication(sys.argv)
    QApplication.setStyle(QStyleFactory.create('Plastique'))
    myGUI = CustomMainWindow()
    currentExitCode = app2.exec_()
