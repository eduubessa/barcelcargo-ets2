'use strict';

//Models
const User = require('../Models/User');

class UserCreateRequest {

    validation = [];

    constructor(request)
    {
        this.checkUsernameExist(request.body.username);
    }

    async checkUsernameExist(username)
    {

        const users = await User.find({ nickname: username }).then((users) => {
            return users;
        }).catch((err) => {
            if(err) throw err;
        })

        if(users.length > 0){
            this.validation.push({ "username" : "O utilizador já está a ser utilizado!"})
        }
    }

    destructor()
    {

    }
}

module.exports = UserCreateRequest;
