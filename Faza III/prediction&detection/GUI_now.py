import sys, torch
from PyQt5.QtWidgets import *
from PyQt5.QtCore import *
from PyQt5.QtGui import *
from basic import options_now
from Training_now import LinearModel


class AnotherWindow(QWidget):
    def __init__(self, rez):
        super().__init__()
        self.setWindowTitle("Prediction result")
        self.setWindowIcon(QIcon('./imgs/cardioguardian.png'))
        self.setGeometry(100, 100, 450, 50)
        layout = QVBoxLayout()
        out_list = ['Does not have disease', 'Has disease']
        self.label = QLabel("Has disease now? - {}".format(out_list[rez]))
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

    def predvidi(self, ageValue, genderValue, chestPainValue, RestingBloodPressureValue,
                 totalCholesterolValue, fastingBloodSugarValue, ecgRestingValue,
                 maxheartRateValue, painDuringTrainingValue, oldpeakValue, STslopeValue):

        inputs = torch.tensor([ageValue, genderValue,
                               chestPainValue, RestingBloodPressureValue,
                               totalCholesterolValue,
                               fastingBloodSugarValue, ecgRestingValue,
                               maxheartRateValue, painDuringTrainingValue,
                               oldpeakValue, STslopeValue])

        ###
        model_number = 'now'
        loading_path = './model/Model_{}'.format(model_number)
        ###

        device = torch.device('cpu')
        model = LinearModel(input_dim=11)  # 11 attributes

        # restore
        model.load_state_dict(torch.load(loading_path + '.pth'), strict=False)

        model.to(device)
        print("Using: ", device)

        out = model(inputs.float())
        result = 1 if out[1] > out[0] else 0  # one hot encoding
        self.w = AnotherWindow(result)
        self.w.show()

    def onStart(self):

        self.predvidi(self.ageValue.value(), self.genderValue.currentIndex(),
                      self.chestPainValue.value(), self.RestingBloodPressureValue.value(),
                      self.totalCholesterolValue.value(), self.fastingBloodSugarValue.currentIndex(), self.ecgRestingValue.currentIndex(),
                      self.maxheartRateValue.value(), self.painDuringTrainingValue.currentIndex(), self.oldpeakValue.value(), self.STslopeValue.value())

    def input_table(self):
        self.label1 = QLabel("    Please insert all information")
        self.label1.setFont(QFont('Arial', 14))
        self.LAYOUT_A.addWidget(self.label1, *(9, 5))

        self.label4 = QLabel("Age:")
        self.LAYOUT_A.addWidget(self.label4, *(10, 5))
        self.ageValue = QSpinBox()
        self.ageValue.setMaximum(200)
        self.ageValue.setMinimum(1)
        self.LAYOUT_A.addWidget(self.ageValue, *(10, 10))

        self.label3 = QLabel("Gender:")
        self.LAYOUT_A.addWidget(self.label3, *(15, 5))
        self.genderValue = QComboBox()
        self.genderValue.addItems(options_now.gender)
        self.LAYOUT_A.addWidget(self.genderValue, *(15, 10))

        self.label5 = QLabel("Pain in chest on scale from 1 to 4?:")
        self.LAYOUT_A.addWidget(self.label5, *(20, 5))
        self.chestPainValue = QSpinBox()
        self.chestPainValue.setMaximum(4)
        self.chestPainValue.setMinimum(1)
        self.LAYOUT_A.addWidget(self.chestPainValue, *(20, 10))

        self.label6 = QLabel("Resting blood pressure:")
        self.LAYOUT_A.addWidget(self.label6, *(25, 5))
        self.RestingBloodPressureValue = QSpinBox()
        self.RestingBloodPressureValue.setMaximum(500)
        self.RestingBloodPressureValue.setMinimum(1)
        self.LAYOUT_A.addWidget(self.RestingBloodPressureValue, *(25, 10))

        self.label7 = QLabel("Level of cholesterol:")
        self.LAYOUT_A.addWidget(self.label7, *(30, 5))
        self.totalCholesterolValue = QSpinBox()
        self.totalCholesterolValue.setMaximum(500)
        self.totalCholesterolValue.setMinimum(1)
        self.LAYOUT_A.addWidget(self.totalCholesterolValue, *(30, 10))

        self.label8 = QLabel("Fasting blood sugar:")
        self.LAYOUT_A.addWidget(self.label8, *(35, 5))
        self.fastingBloodSugarValue = QComboBox()
        self.fastingBloodSugarValue.addItems(options_now.fastingBloodSugar)
        self.LAYOUT_A.addWidget(self.fastingBloodSugarValue, *(35, 10))

        self.label9 = QLabel("Is your resting ECG good or bad?")
        self.LAYOUT_A.addWidget(self.label9, *(40, 5))
        self.ecgRestingValue = QComboBox()
        self.ecgRestingValue.addItems(options_now.ecgResting)
        self.LAYOUT_A.addWidget(self.ecgRestingValue, *(40, 10))

        self.label10 = QLabel("Max heart rate value?:")
        self.LAYOUT_A.addWidget(self.label10, *(45, 5))
        self.maxheartRateValue = QSpinBox()
        self.maxheartRateValue.setMaximum(350)
        self.maxheartRateValue.setMinimum(1)
        self.LAYOUT_A.addWidget(self.maxheartRateValue, *(45, 10))

        self.label12 = QLabel("Do you feel any pain while working out?")
        self.LAYOUT_A.addWidget(self.label12, *(50, 5))
        self.painDuringTrainingValue = QComboBox()
        self.painDuringTrainingValue.addItems(options_now.painDuringTraining)
        self.LAYOUT_A.addWidget(self.painDuringTrainingValue, *(50, 10))

        self.label13 = QLabel("OldPeak value:")
        self.LAYOUT_A.addWidget(self.label13, *(55, 5))
        self.oldpeakValue = QDoubleSpinBox()
        self.oldpeakValue.setMaximum(4)
        self.oldpeakValue.setMinimum(0)
        self.LAYOUT_A.addWidget(self.oldpeakValue, *(55, 10))

        self.label14 = QLabel("ST slope value:")
        self.LAYOUT_A.addWidget(self.label14, *(60, 5))
        self.STslopeValue = QSpinBox()
        self.STslopeValue.setMaximum(3)
        self.STslopeValue.setMinimum(0)
        self.LAYOUT_A.addWidget(self.STslopeValue, *(60, 10))


if __name__ == '__main__':
    app2 = QApplication(sys.argv)
    QApplication.setStyle(QStyleFactory.create('Plastique'))
    myGUI = CustomMainWindow()
    currentExitCode = app2.exec_()
