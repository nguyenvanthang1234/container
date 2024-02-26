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
      "users",
      [
        {
          name: "đại",
          email: "thang.@gmail.com",
          password:"123445",
          numberPhone:"0987988766",
          avatar:"https://marketplace.canva.com/EAEwOMN95cA/1/0/1600w/canva-h%E1%BB%93ng-ch%E1%BA%A5m-tr%C3%B2n-l%C3%A0m-%C4%91%E1%BA%B9p-ch%C4%83m-s%C3%B3c-da-%E1%BA%A3nh-b%C3%ACa-facebook-8I987-LcfSI.jpg",
          type:"admin",
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
    await queryInterface.bulkDelete("users", null, {});
  },
};
