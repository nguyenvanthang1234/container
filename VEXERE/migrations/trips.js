'use strict';
/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up(queryInterface, Sequelize) {
    await queryInterface.createTable('Trips', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      name: {
        type: Sequelize.STRING
      },
      toStation: {
        type: Sequelize.STRING
      },
      fromStation: {
        type: Sequelize.STRING
      },
      startTime: {
        type: Sequelize.TIME
      },
      price: {
        type: Sequelize.INTEGER
      },
      stationId: {
        type: Sequelize.INTEGER,
        references:{
          model:"stations",
          key:"id"
        }
      },
      createdAt: {
        allowNull: false,
        type: Sequelize.DATE
      },
      updatedAt: {
        allowNull: false,
        type: Sequelize.DATE
      }
    });
  },
  async down(queryInterface, Sequelize) {
    await queryInterface.dropTable('Trips');
  }
};