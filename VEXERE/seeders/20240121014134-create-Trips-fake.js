"use strict";

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up(queryInterface, Sequelize) {
    /**
     * Add seed commands here.
     *
     * Example:
     */
    await queryInterface.bulkInsert(
      "trips",
      [
        {
          name: "bến xe giáp bát",
          fromStation: 1,
          toStation: 3,
          startTime: "2023-05-11 09:20:00",
          price: 150000,
          createdAt:"2021-04-07",
          updatedAt:"2021-04-07"
        },
        {
          name: "bến xe mỹ đình",
          fromStation: 2,
          toStation: 4,
          startTime: "2023-05-11 09:20:00",
          price: 150000,
          createdAt:"2021-04-07",
          updatedAt:"2021-04-07"
        },
        {
          name: "bến xe yên nghĩa",
          fromStation: 4,
          toStation: 4,
          startTime: "2023-05-11 09:20:00",
          price: 250000,
          createdAt:"2021-04-07",
          updatedAt:"2021-04-07"
        },
      ],
      {}
    );
  },

  async down(queryInterface, Sequelize) {
    /**
     * Add commands to revert seed here.
     *
     * Example:
     */
    await queryInterface.bulkDelete("trips", null, {});
  },
};
