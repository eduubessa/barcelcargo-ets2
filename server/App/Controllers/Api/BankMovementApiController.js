'use strict';

// Models
const User = require('../../Models/User');
const Bank = require('../../Models/Bank');
const BankMovement = require('../../Models/BankMovement');

class BankMovementApiController {

    /**
     * Fetch all bank movements
     *
     * @param request
     * @param response
     * @param next
     * @returns {*}
     */
    all(request, response, next) {
        return response.send("moviment");
    }

    /**
     * Fetch all bank moves by id or user bank id
     *
     * @param request
     * @param response
     * @param next
     * @returns {Promise<void>}
     */
    async show(request, response, next) {
        await User.findOne({ nickname: request.params.username }, async (err, user = null) => {
            if(err) response.status(500).send(user);
            if(user !== null) {
                // Find bank movement by user id or user bank id
                BankMovement.find({ $or: [ { user: user._id }, { bank_sent: user.bank._id} ]}, (err, bankMovements) => {
                    if(err) throw err;
                    response.json(bankMovements);
                });
            }else{
                response.send("Não encontramos o utilizador pretendido!");
            }
        }).populate('bank');
    }

    /**
     * Create a bank movement and update balance user_sent and user_receiver
     *
     * @param request
     * @param response
     * @param next
     * @returns {Promise<void>}
     */
    async create(request, response, next) {

        let newBankMovement = new BankMovement({
            user: request.body.user,
            bank_sent: request.body.bank_sent,
            bank_receiver: request.body.bank_receiver,
            description: request.body.description,
            move_money: request.body.move_money,
            balance_final: request.body.balance_final
        });

        // Create a new bank movement
        newBankMovement.save((err, bankMovement) => {
            if (err) throw response.status(500).send(err);
            response.send("Movimento efetuado com sucesso!");
        });

        // Update a user_sent balance
        User.findOne({ _id: request.body.user }, async (err, user = null) => {
            if(err) throw err;
            console.log(user);
            if(user === null) {
                await Bank.update({ _id: user.bank }, { $set: { balance: 4000 }}, (err, bank) => {
                    console.log(bank);
                });
            }
        });

        // Update a user_receiver balance


    }
}

module.exports = BankMovementApiController;
