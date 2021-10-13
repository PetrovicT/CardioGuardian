import torch, random
import math
from torch.utils.data import Dataset
from torch.utils.data import DataLoader ## for iterating, batching, data loading process
import torch.nn as nn  ## for creating and training neural network
from basic import training_procedure
import pandas as pd  ## data manipulation and analysis
from torch.optim import lr_scheduler ## adjusting learning rate
import plotly.graph_objects as go
from plotly.subplots import make_subplots

class LinearModel(nn.Module):

    def __init__(self, input_dim):
        super(LinearModel, self).__init__()
        self.fc1 = nn.Sequential(
            nn.Linear(input_dim, 60, bias=True),
            nn.ReLU(inplace=True))
        self.fc2 = nn.Sequential(
            nn.Linear(60, 40, bias=True),
            nn.ReLU(inplace=True))
        self.fc3 = nn.Sequential(
            nn.Linear(40, 10, bias=True),
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
        # datapoint =
        return torch.tensor(datapoint), target

    def __len__(self):
        return len(self.data)


def count_ones_zeros(ys):
    ones = 0
    for y in ys:
        ones += y
    print('There is {} zeros on output and {} ones'.format(len(ys)-ones, ones))


if __name__ == '__main__':
    model_number = 'now'
    in_path = "./presenceOfDisease/heart_statlog_cleveland_hungary_final.csv"
    saving_path = './model/Model_{}'.format(model_number)
    train_proc = 70
    val_proc = 20
    test_proc = 10
    batch_size = 10
    n_epochs = 100
    learning_rate = 0.0003

    random.seed(1000)
    device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')
    data = pd.read_csv(in_path, delimiter=',')
    xs = []
    ys = []
    for row in data.iterrows():
        if not math.isnan(row[1][-1]):
            ys.append(row[1][-1])
            xs.append([])
            for k in row[1][:-1]:
                if not math.isnan(k):
                    xs[-1].append(k)
                else:
                    ys.pop()
                    xs.pop()
                    break
    train_proc = int(len(ys)*train_proc/100)
    val_proc = int(len(ys)*val_proc/100)
    test_proc = len(ys) - val_proc - train_proc
    print('All data:')
    count_ones_zeros(ys)
    c = list(zip(xs, ys))
    random.shuffle(c)
    xs, ys = zip(*c)
    print('Training:')
    count_ones_zeros(ys[:train_proc])
    print('Validation:')
    count_ones_zeros(ys[train_proc:(train_proc+val_proc)])
    dataset_train = NumpyDataset(xs[:train_proc], ys[:train_proc])
    dataloader_train = DataLoader(dataset_train, batch_size=batch_size, shuffle=True)
    dataset_validation = NumpyDataset(xs[train_proc:(train_proc+val_proc)], ys[train_proc:(train_proc+val_proc)])
    dataloader_validation = DataLoader(dataset_validation, batch_size=batch_size, shuffle=True)
    dataset_test = NumpyDataset(xs[(train_proc+val_proc):], ys[(train_proc+val_proc):])
    dataloader_test = DataLoader(dataset_test, batch_size=1, shuffle=True)

    model = LinearModel(input_dim=len(xs[0]))
    model = model.to(device)
    optimizer = torch.optim.Adam([
        {'params': model.parameters()}
    ], lr=learning_rate, weight_decay=0.0005)

    scheduler =  lr_scheduler.StepLR(optimizer, step_size=20, gamma=0.5)

    loss_function = nn.CrossEntropyLoss()

    train_losses, val_losses, train_accuracies, val_accuracies, model \
        = training_procedure.train(model=model, train_dataloader=dataloader_train, val_dataloader=dataloader_validation,
                                  optimizer=optimizer, n_epochs=n_epochs, loss_function=loss_function, scheduler=scheduler)

    torch.save(model.state_dict(), saving_path+'.pth')
    print("Using: ", device)
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
