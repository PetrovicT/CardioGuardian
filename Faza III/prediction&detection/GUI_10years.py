import sys, torch
from PyQt5.QtWidgets import *
from PyQt5.QtCore import *
from PyQt5.QtGui import *
from basic import options
from Training_10years import LinearModel


class AnotherWindow(QWidget):
    def __init__(self, rez):
        super().__init__()
        self.setWindowTitle("Prediction result")
        self.setWindowIcon(QIcon('./imgs/cardioguardian.png'))
        self.setGeometry(100, 100, 450, 50)
        layout = QVBoxLayout()
        out_list = ['No predisposition ', 'Has predisposition']
        self.label = QLabel("Predicted - {}".format(out_list[rez]))
        self.label.setFont(QFont('Arial', 10))
        layout.addWidget(self.label)
        self.setLayout(layout)


class CustomMainWindow(QMainWindow):
    EXIT_CODE_REBOOT = -123
    def __init__(self):
        super(CustomMainWindow, self).__init__()

        self.setWindowTitle("Testing")
        self.setWindowIcon(QIcon('./imgs/cardioguardian.png'))
        self.setGeometry(100, 100, 550, 650)

        self.widget = QWidget()
        self.LAYOUT_A = QGridLayout()
        self.scroll = QScrollArea()
        self.input_table()

        self.start = QPushButton('Start')
        self.start.clicked.connect(self.onStart)
        self.LAYOUT_A.addWidget(self.start, *(100, 10))

        self.widget.setLayout(self.LAYOUT_A)

        self.scroll.setVerticalScrollBarPolicy(Qt.ScrollBarAlwaysOn)
        self.scroll.setWidgetResizable(True)
        self.scroll.setWidget(self.widget)
        self.setCentralWidget(self.scroll)
        self.statusBar().showMessage('Please enter all values correctly and press "Start"')
        self.show()
        return


    def predict(self, gendervalue, ageValue, smokerValue, cigPerDayValue,
                 BPMedsValue, strokeValue, hypertensionValue,
                 diabetesValue, totalCValue, upperBPValue, lowerBPValue,
                 bmiValue, heartBValue, glucoseValue, eduValue):

        inputs = torch.tensor([gendervalue, ageValue,
                               smokerValue, cigPerDayValue,
                               BPMedsValue,
                               strokeValue, hypertensionValue,
                               diabetesValue, totalCValue,
                               upperBPValue, lowerBPValue,
                               bmiValue, heartBValue, glucoseValue,
                               eduValue+1])

        ###
        model_number = 10
        loading_path = './model/Model_{}years'.format(model_number)
        ###

        device = torch.device('cpu')
        model = LinearModel(input_dim=15)  # there are 15 attributes

        # restore
        model.load_state_dict(torch.load(loading_path + '.pth'), strict=False)
        model.to(device)
        print("Using: ", device)

        out = model(inputs)
        rezultat = 1 if out[1] > out[0] else 0  # one hot encoding

        self.w = AnotherWindow(rezultat)  # print result on new window
        self.w.show()

    def onStart(self):    # when we press start, call function predict with arguments

        self.predict(self.genderValue.currentIndex(), self.ageValue.value(),
                       self.smokerValue.currentIndex(), self.cigPerDayValue.value(),
                       self.BPMedsValue.currentIndex(),
                       self.strokeValue.currentIndex(), self.hypertensionValue.currentIndex(),
                       self.diabetesValue.currentIndex(), self.totalCValue.value(),
                       self.upperBPValue.value(), self.lowerBPValue.value(),
                       self.bmiValue.value(), self.heartBValue.value(), self.glucoseValue.value(),
                       self.eduValue.currentIndex())


    def input_table(self):
        self.label1 = QLabel("    Please enter all values correctly")
        self.label1.setFont(QFont('Arial', 14))
        self.LAYOUT_A.addWidget(self.label1, *(9, 5))

        self.label3 = QLabel("Gender:")
        self.LAYOUT_A.addWidget(self.label3, *(10, 5))
        self.genderValue = QComboBox()   # comboBox is like select and option in html
        self.genderValue.addItems(options.gender)
        self.LAYOUT_A.addWidget(self.genderValue, *(10, 10))

        self.label4 = QLabel("Age:")
        self.LAYOUT_A.addWidget(self.label4, *(15, 5))
        self.ageValue = QSpinBox()
        self.ageValue.setMaximum(200)
        self.ageValue.setMinimum(1)
        self.LAYOUT_A.addWidget(self.ageValue, *(15, 10))

        self.label5 = QLabel("Are you smoking?:")
        self.LAYOUT_A.addWidget(self.label5, *(20, 5))
        self.smokerValue = QComboBox()
        self.smokerValue.addItems(options.smoker)
        self.LAYOUT_A.addWidget(self.smokerValue, *(20, 10))

        self.label6 = QLabel("Number of cigarettes per day:")
        self.LAYOUT_A.addWidget(self.label6, *(25, 5))
        self.cigPerDayValue = QSpinBox()
        self.cigPerDayValue.setMaximum(100)
        self.cigPerDayValue.setMinimum(0)
        self.LAYOUT_A.addWidget(self.cigPerDayValue, *(25, 10))

        self.label7 = QLabel("Do you use medications for \nblood pressure?:")
        self.LAYOUT_A.addWidget(self.label7, *(30, 5))
        self.BPMedsValue = QComboBox()
        self.BPMedsValue.addItems(options.BPMeds)
        self.LAYOUT_A.addWidget(self.BPMedsValue, *(30, 10))

        self.label8 = QLabel("Did you have a stroke \nbefore?:")
        self.LAYOUT_A.addWidget(self.label8, *(35, 5))
        self.strokeValue = QComboBox()
        self.strokeValue.addItems(options.historyStroke)
        self.LAYOUT_A.addWidget(self.strokeValue, *(35, 10))

        self.label9 = QLabel("Do you have hypertension?:")
        self.LAYOUT_A.addWidget(self.label9, *(40, 5))
        self.hypertensionValue = QComboBox()
        self.hypertensionValue.addItems(options.hypertension)
        self.LAYOUT_A.addWidget(self.hypertensionValue, *(40, 10))

        self.label10 = QLabel("Do you have diabetes?:")
        self.LAYOUT_A.addWidget(self.label10, *(45, 5))
        self.diabetesValue = QComboBox()
        self.diabetesValue.addItems(options.diabetes)
        self.LAYOUT_A.addWidget(self.diabetesValue, *(45, 10))

        self.label12 = QLabel("Total cholesterol level:")
        self.LAYOUT_A.addWidget(self.label12, *(50, 5))
        self.totalCValue = QSpinBox()
        self.totalCValue.setMaximum(300)
        self.totalCValue.setMaximum(100)
        self.LAYOUT_A.addWidget(self.totalCValue, *(50, 10))

        self.label13 = QLabel("Upper blood pressure:")
        self.LAYOUT_A.addWidget(self.label13, *(55, 5))
        self.upperBPValue = QDoubleSpinBox()
        self.upperBPValue.setMaximum(300)
        self.upperBPValue.setMinimum(50)
        self.upperBPValue.setDecimals(1)
        self.LAYOUT_A.addWidget(self.upperBPValue, *(55, 10))

        self.label14 = QLabel("Lower blood pressure:")
        self.LAYOUT_A.addWidget(self.label14, *(60, 5))
        self.lowerBPValue = QDoubleSpinBox()
        self.lowerBPValue.setDecimals(1)
        self.lowerBPValue.setMaximum(300)
        self.lowerBPValue.setMinimum(10)
        self.LAYOUT_A.addWidget(self.lowerBPValue, *(60, 10))

        self.label15 = QLabel("BMI:")
        self.LAYOUT_A.addWidget(self.label15, *(65, 5))
        self.bmiValue = QDoubleSpinBox()
        self.bmiValue.setDecimals(2)
        self.bmiValue.setMaximum(80)
        self.bmiValue.setMinimum(15)
        self.LAYOUT_A.addWidget(self.bmiValue, *(65, 10))

        self.label16 = QLabel("Heart beats:")
        self.LAYOUT_A.addWidget(self.label16, *(70, 5))
        self.heartBValue = QSpinBox()
        self.heartBValue.setMaximum(150)
        self.heartBValue.setMinimum(30)
        self.LAYOUT_A.addWidget(self.heartBValue, *(70, 10))

        self.label17 = QLabel("Level of glucose in blood:")
        self.LAYOUT_A.addWidget(self.label17, *(75, 5))
        self.glucoseValue = QSpinBox()
        self.glucoseValue.setMaximum(250)
        self.glucoseValue.setMinimum(50)
        self.LAYOUT_A.addWidget(self.glucoseValue, *(75, 10))

        self.label18 = QLabel("Education:")
        self.LAYOUT_A.addWidget(self.label18, *(80, 5))
        self.eduValue = QComboBox()
        self.eduValue.addItems(options.education)
        self.LAYOUT_A.addWidget(self.eduValue, *(80, 10))


if __name__ == '__main__':
    app = QApplication(sys.argv)
    QApplication.setStyle(QStyleFactory.create('Plastique'))
    myGUI = CustomMainWindow()
    currentExitCode = app.exec_()
