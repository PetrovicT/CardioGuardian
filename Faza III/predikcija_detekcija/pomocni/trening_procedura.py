import numpy as np
import torch

device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')

def train(model, train_dataloader, val_dataloader, optimizer, n_epochs, loss_function, scheduler):
    train_losses = []
    val_losses = []
    train_accuracies = []
    val_accuracies = []

    for epoch in range(n_epochs): # do n_epochs
        model.train() # model se koristi za treniranje
        correct_train_predictions = 0
        losses = []

        for variables, ys in train_dataloader: # za svaki skup ulaznih podataka
            variables = variables.to(device)
            ys = ys.to(device)
            output = model(variables)   # predikcija na osnovu variables tj ulaza

            optimizer.zero_grad() # u PyTorch moramo da postavimo gradijente na 0 pre propagacije unazad
            loss = loss_function(output, ys.long())   # sta smo dobili kao output i vrednosti koje su tacne, pa izraunaj koliko je lose
            loss.backward() # loss se propagira pozadi i racuna koliko bi trebalo da se updateuje sve od tezina
            optimizer.step() # radi update parametara, update tezina

            losses.append(loss.item())  # u niz loss za batcheve se doda loss za batch

            n_correct = torch.sum(output.argmax(1) == ys).item()  # one hot encoding - imamo 2 klase(0 i 1) tj 2 izlaza i gde je 1 na izlazu ta je klasa
            # koji je veci od 2 izlaza i onda argmax vraca indeks tog koji je veci (0 ili 1)
            # ys je tacna vrednost

            correct_train_predictions += n_correct

        train_losses.append(np.mean(np.array(losses)))
        train_accuracies.append(100.0*correct_train_predictions/len(train_dataloader.dataset))

        # Evaluacija
        model.eval()  #model se koristi za evaluaciju
        correct_val_predictions = 0
        losses = []

        with torch.no_grad(): # iskljuci racunanje gradijenta, ne treniramo
            # torch.no_grad smanjuje zauzece memorije
            for variables, ys in val_dataloader:
                variables = variables.to(device)
                ys = ys.to(device)
                output = model(variables) # prosledimo ulaze, i dobijemo izlaz
                loss = loss_function(output, ys)  # sta smo dobili kao output i vrednosti koje su tacne, pa izraunaj koliko je lose

                losses.append(loss.item())   # u niz loss za batcheve se doda loss za batch
                n_correct_v = torch.sum(output.argmax(1) == ys).item()  # one hot encoding - imamo 2 klase(0 i 1) tj 2 izlaza i gde je 1 na izlazu ta je klasa
                 # koji je veci od 2 izlaza i onda argmax vraca indeks tog koji je veci (0 ili 1)
                 # ys je tacna vrednost
                correct_val_predictions += n_correct_v

        val_losses.append(np.mean(np.array(losses)))
        val_accuracies.append(100.0*correct_val_predictions/len(val_dataloader.dataset))
        scheduler.step()
        print('Epoch {}/{}: train_loss: {:.4f}, train_accuracy: {:.4f}, val_loss: {:.4f}, val_accuracy: {:.4f}'.format(epoch+1, n_epochs,
                                                                                                                       train_losses[-1],
                                                                                                                       train_accuracies[-1],                                                                                                              val_losses[-1],
                                                                                                                       val_accuracies[-1]))
    return train_losses, val_losses, train_accuracies, val_accuracies, model
