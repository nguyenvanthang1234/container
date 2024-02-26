'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Trips extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
      Trips.belongsTo(models.Station,{foreignKey:'stationId'})
      Trips.hasMany(models.Passergers,{foreignKey:'tripId'})
      Trips.belongsToMany(models.Users,{through:"Tickes",foreignKey:"tripId",otherKey:"userId"})
    }
  }
  Trips.init({
    toStation: DataTypes.STRING,
    fromStation: DataTypes.STRING,
    price: DataTypes.INTEGER,
    startTime:DataTypes.TIME,
    stationId:DataTypes.INTEGER ,

  }, {
    sequelize,
    modelName: 'Trips',
  }); 
  return Trips;
};