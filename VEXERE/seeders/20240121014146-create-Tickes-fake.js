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
      "tickes",
      [
        {
          tripId: 1,
          userId: 2,
          createdAt:"2021-04-07",
          updatedAt:"2021-04-07"
        },
        {
          tripId: 2,
          userId:3,
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
    await queryInterface.bulkDelete("tickes", null, {});
  },
};
