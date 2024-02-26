'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Tickes extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
      Tickes.belongsTo(models.Users,{foreignKey:"userId"})
      Tickes.belongsTo(models.Trips,{foreignKey:"tripId"})
    }
  }
  Tickes.init({
    tripId: DataTypes.INTEGER,
    userId: DataTypes.INTEGER,

  }, {
    sequelize,
    modelName: 'Tickes',
  });
  return Tickes;
};