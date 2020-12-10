'use strict';

const bcrypt = require("bcrypt");

// Configs
const configBank = require('../../../Config/bank');
const configMail = require('../../../Config/mail');

// Models
const User = require('../../Models/User');
const Bank = require('../../Models/Bank');
const Mail = require('../../Models/Mail');

// Validations
let CreateUserRequest = require('../../Validation/UserCreateRequest')

class UserApiController {

    /**
     *
     * Show all users
     *
     * @param request
     * @param response
     * @param next
     */
    all(request, response, next)
    {
        User.find({}, (err, users) => {
            if (err) response.send(err);
            response.json(users);
        }).populate('bank', '-_id -created_at -updated_at -__v').select('-_id -password -__v')
          .select('-_id -password, -__v')
    }

    /**
     * Create a user
     *
     * @param request
     * @param response
     * @param next
     * @returns {Promise<void>}
     */
    async create(request, response)
    {
        const validation = new CreateUserRequest(request).validation;

        console.log(validation);

        return response.json(validation);

        /**
        if(validation.length <= 0) {

            let bank = new Bank({
                balance: configBank.bank.initialize
            });


        }
         **/
    }

    /**
     * Show only user by url param or body field
     *
     * @param request
     * @param response
     * @param next
     * @returns {any}
     */
    show(request, response, next)
    {
        User.findOne({ $or : [{ nickname: request.params.username }, { email: request.body.email }]}, (err, user) => {
                if (err) throw err;
                response.json(user);
            }).select('-_id, -password, -__v').populate('bank')
    }
}

module.exports = UserApiController;
