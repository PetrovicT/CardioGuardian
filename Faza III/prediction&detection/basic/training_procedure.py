import numpy as np
import torch

device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')

def train(model, train_dataloader, val_dataloader, optimizer, n_epochs, loss_function, scheduler):
    train_losses = []
    val_losses = []
    train_accuracies = []
    val_accuracies = []

    for epoch in range(n_epochs): # do n_epochs
        model.train()
        correct_train_predictions = 0
        losses = []

        for variables, ys in train_dataloader: # for every set of input data
            variables = variables.to(device)
            ys = ys.to(device)
            output = model(variables)   # prediction based on variables

            optimizer.zero_grad() # in PyTorch we need to set gradient to 0 before back propagation
            loss = loss_function(output, ys.long())   # compare output and correct values and get loss
            loss.backward() # loss is being propagated backwards and weight update is beeing calculated
            optimizer.step() # update

            losses.append(loss.item())  # append in array of losses for current batch

            n_correct = torch.sum(output.argmax(1) == ys).item()  # one hot encoding - number of outputs is number of classes, only one output is the biggest
            # argmax returns index of the bigger one output
            # ys is correct value

            correct_train_predictions += n_correct

        train_losses.append(np.mean(np.array(losses)))
        train_accuracies.append(100.0*correct_train_predictions/len(train_dataloader.dataset))

        # Evaluation
        model.eval()
        correct_val_predictions = 0
        losses = []

        with torch.no_grad(): # torch.no_grad saves memory occupation
            for variables, ys in val_dataloader:
                variables = variables.to(device)
                ys = ys.to(device)
                output = model(variables) # output based on given inputs
                loss = loss_function(output, ys)
                losses.append(loss.item())
                n_correct_v = torch.sum(output.argmax(1) == ys).item()  # one hot encoding
                correct_val_predictions += n_correct_v

        val_losses.append(np.mean(np.array(losses)))
        val_accuracies.append(100.0*correct_val_predictions/len(val_dataloader.dataset))
        scheduler.step()
        print('Epoch {}/{}: train_loss: {:.4f}, train_accuracy: {:.4f}, val_loss: {:.4f}, val_accuracy: {:.4f}'.format(epoch+1, n_epochs,
                                                                                                                       train_losses[-1],
                                                                                                                       train_accuracies[-1],                                                                                                              val_losses[-1],
                                                                                                                       val_accuracies[-1]))
    return train_losses, val_losses, train_accuracies, val_accuracies, model
