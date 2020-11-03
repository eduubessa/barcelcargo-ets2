'use strict';

const mongoose = require('mongoose');
const bcrypt = require("bcrypt");

// Configs
const configBank = require('../../../Config/Bank');

// Models
const User = require('../../Models/User');
const Bank = require('../../Models/Bank');

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
    async create(request, response, next)
    {
        let validation = [];

        let username = await User.countDocuments({ nickname : request.body.username }, (err, users) => {
            if (err) response.send(err);
            return users;

        });

        let email = await User.countDocuments({ email : request.body.email }, (err, users) => {
            if (err) throw response.send(err);
            return users;
        });

        if(username > 0) {
            validation.push({ username: 'O utilizador que introduziste já existe!'});
        }

        if(email > 0) {
            validation.push({ email: 'O email que introduziste já está a ser usado'});
        }

        let bank = new Bank({
            balance: configBank.bank.initialize
        });

        if(validation.length <= 0) {

            bank.save(async (err, bank) => {
                if (err) throw err;

                await bcrypt.hash(request.body.password, 10, (err, password) => {
                    if (err) throw err;

                    let newUser = new User({
                        name: request.body.name,
                        nickname: request.body.username,
                        password: password,
                        email: request.body.email,
                        bank: bank
                    });

                    newUser = newUser.save((err, user) => {
                        if (err) throw err;
                        console.log(user);
                    });
                });
            });
        }

        return response.json(validation);
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
