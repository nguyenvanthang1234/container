'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Users extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
      Users.belongsToMany(models.Trips,{through:"Tickes",foreignKey:"userId",otherKey:"tripId"})
    }
  }
  Users.init({
    name: DataTypes.STRING,
    numberPhone: DataTypes.STRING,
    email: DataTypes.STRING,
    password: DataTypes.STRING,
    type: DataTypes.STRING,
    avatar:DataTypes.STRING
  }, {
    sequelize,
    modelName: 'Users',
  });
  return Users;
};