import torch, random
import math
from torch.utils.data import Dataset
from torch.utils.data import DataLoader ## za iteriranje, za batching, data loading process
import torch.nn as nn  ## za kreiranje i treniranje neuralne mreže
from pomocni import trening_procedura
import pandas as pd  ## manipulacija podacima i analiza
from torch.optim import lr_scheduler ## podesavanje learning rate
import plotly.graph_objects as go ## za iscrtavanje grafika
from plotly.subplots import make_subplots ## za iscrtavanje grafika


class LinearModel(nn.Module): ## izvedena iz nn.Module

    def __init__(self, input_dim): ## konstruktor
        super(LinearModel, self).__init__()
        self.fc1 = nn.Sequential( ## fully connected - svaki neuron je povezan sa svakim iz prethodnog sloja
            nn.Linear(input_dim, 40, bias=True), ## ulaza koliko ima, 50 izlaznih neurona
            nn.ReLU(inplace=True))  ## f-ja aktivacije je ReLU
        self.fc2 = nn.Sequential(
            nn.Linear(40, 50, bias=True),
            nn.ReLU(inplace=True))
        self.fc3 = nn.Sequential(
            nn.Linear(50, 10, bias=True),
            nn.ReLU(inplace=True))
        self.fc4 = nn.Sequential(
            nn.Linear(10, 2, bias=True))

    def forward(self, input):
        input = self.fc1(input)
        input = self.fc2(input)
        input = self.fc3(input)
        out = self.fc4(input)
        return out


class NumpyDataset(Dataset):
    def __init__(self, data, target):
        self.data = data
        self.target = target

    def __getitem__(self, index):
        datapoint = self.data[index]
        target = int(self.target[index])
        return torch.tensor(datapoint), target

    def __len__(self):
        return len(self.data)

def count_ones_zeros(ys): ## ispis koliko ima 0 i 1 na izlazu tj y
    ones = 0
    for y in ys:
        ones += y
    print('Ima {} nula na izlazu and {} jedinica'.format(len(ys)-ones, ones))

if __name__ == '__main__':
    model_number = '10god'
    in_path = "./10god_predikcija/framingham.csv"
    saving_path = './model/Model_{}'.format(model_number)
    train_proc = 70 #uzecemo 70% podataka za trening
    val_proc = 20 #uzecemo 20% podataka za validaciju
    test_proc = 10 #uzecemo 10% podataka za test
    batch_size = 25
    n_epochs = 50
    learning_rate = 0.01

    random.seed(1000)
    device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')
    data = pd.read_csv(in_path, delimiter=',')
    xs = [] #ulazi
    ys = [] #izlazi
    for row in data.iterrows():
        if not math.isnan(row[1][-1]): #not a number
            ys.append(row[1][-1])
            xs.append([])
            for k in row[1][:-1]:
                if not math.isnan(k):
                    xs[-1].append(k)
                else:
                    ys.pop()
                    xs.pop()
                    break
    train_proc = int(len(ys)*train_proc/100) # uzimamo 70% za trening, ali od broja podataka koji ne sadrze nan
    val_proc = int(len(ys)*val_proc/100)
    test_proc = len(ys) - val_proc - train_proc
    print('Svi podaci:')
    count_ones_zeros(ys)
    c = list(zip(xs, ys))
    random.shuffle(c)
    xs, ys = zip(*c)
    print('Trening:')
    count_ones_zeros(ys[:train_proc])
    print('Validacija:')
    count_ones_zeros(ys[train_proc:(train_proc+val_proc)])

    dataset_train = NumpyDataset(xs[:train_proc], ys[:train_proc])
    dataloader_train = DataLoader(dataset_train, batch_size=batch_size, shuffle=True) #po epohi

    dataset_validation = NumpyDataset(xs[train_proc:(train_proc+val_proc)], ys[train_proc:(train_proc+val_proc)])
    dataloader_validation = DataLoader(dataset_validation, batch_size=batch_size, shuffle=True)

    dataset_test = NumpyDataset(xs[(train_proc+val_proc):], ys[(train_proc+val_proc):])
    dataloader_test = DataLoader(dataset_test, batch_size=1, shuffle=True)

    model = LinearModel(input_dim=len(xs[0]))
    model = model.to(device)
    optimizer = torch.optim.Adam([
        {'params': model.parameters()}
    ], lr=learning_rate, weight_decay=0.0005)

    scheduler =  lr_scheduler.StepLR(optimizer, step_size=10, gamma=0.1) # na svakih 10 epoha se menja learning rate tj mnozi sa 0.1

    loss_function = nn.CrossEntropyLoss() # racuna loss modela, korisno ako imamo neizbalansiran set podataka kao sto imamo

    train_losses, val_losses, train_accuracies, val_accuracies, model \
        = trening_procedura.train(model=model, train_dataloader=dataloader_train, val_dataloader=dataloader_validation,
                                  optimizer=optimizer, n_epochs=n_epochs, loss_function=loss_function, scheduler=scheduler)

    torch.save(model.state_dict(), saving_path+'.pth')
    print("Koristi se:  ", device)
    e_fig = make_subplots(rows=2, cols=2, specs=[[{"colspan": 2}, None],
                                                 [{"colspan": 2}, None]])
    e_fig.add_trace(go.Scatter(y=train_losses, mode='lines',
                               name='Train_Loss'), row=1, col=1)
    e_fig.add_trace(go.Scatter(y=val_losses, mode='lines',
                               name='Val_Loss'), row=1, col=1)

    e_fig.add_trace(go.Scatter(y=train_accuracies, mode='lines',
                               name='Train_Acc'), row=2, col=1)
    e_fig.add_trace(go.Scatter(y=val_accuracies, mode='lines',
                               name='Val_Acc'), row=2, col=1)
    e_fig.show()

