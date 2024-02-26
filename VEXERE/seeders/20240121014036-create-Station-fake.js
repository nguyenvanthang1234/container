// sequelize seed:generate --name create-station-fake
// sequelize db:seed:all
//  sequelize db:seed:undo:all
// check key :SET GLOBAL FOREIGN_KEY_CHECKS=0

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
      "stations",
      [
        {
          name: "bến xe mỹ đình",
          address: "giải phóng",
          province: "hà nội",
          createdAt:"2021-04-07",
          updatedAt:"2021-04-07"
       
        },
        {
          name: "bến xe nước ngầm",
          address: "giải phóng",
          province: "hà nội",
          createdAt:"2021-04-07",
          updatedAt:"2021-04-07"
         
        },
        {
          name: "bến xe yên nghĩa",
          address: "giải phóng",
          province: "hà nội",
          createdAt:"2021-04-07",
          updatedAt:"2021-04-07"
          
        }
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
    await queryInterface.bulkDelete("stations", null, {});
  },
};
