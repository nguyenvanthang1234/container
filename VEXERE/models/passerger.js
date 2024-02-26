'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Passergers extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
      Passergers.belongsTo(models.Trips,{foreignKey:"tripId"})
      Passergers.hasMany(models.Vehicles,{foreignKey:"passergerId"})
    }
  }
  Passergers.init({
    name: DataTypes.STRING,
    image: DataTypes.STRING,
    description: DataTypes.STRING,
    tripId: DataTypes.INTEGER,
  }, {
    sequelize,
    modelName: 'Passergers',
  });
  return Passergers;
};