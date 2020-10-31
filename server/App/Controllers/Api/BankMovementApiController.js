'use strict';

// Models
const BankMovement = require('../../Models/BankMovement');

class BankMovementApiController {

    async all(request, response, next)
    {
        await BankMovement.find({}, (err, bankMovements) => {
            if (err) throw err;
            response.send(bankMovements)
        });
    }

}

module.exports = BankMovementApiController;
