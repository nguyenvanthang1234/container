const { Trips, Station } = require("../models");

const createTrip = async (req, res) => {
  const { fromStation, toStation, startTime, price, stationId } = req.body;
  const newTrip = await Trips.create({
    fromStation,
    toStation,
    startTime,
    price,
    stationId,
  });
  res.status(201).send(newTrip);
};
const getAll = async (req, res) => {
  try {
    const tripList = await Trips.findAll({
      include: [
        {
          model: Station,
          // as: "id" // Bạn có thể loại bỏ phần này nếu không cần alias
        },
      ],
    });

    res.status(200).send(tripList);
  } catch (error) {
    res.status(500).send(error);
  }
};

const deleteId = async (req, res) => {
  const { id } = req.params;
  await Trips.destroy({
    where: {
      id,
    },
  });
  res.send(`da xoa trip co id:${id}`);
};

const updateTrip = async (req, res) => {
  const { id } = req.params;
  const { fromStation, toStation, startTimem, price, stationID } = req.body;
  await Trips.update(
    {
      fromStation,
      toStation,
      startTimem,
      price,
      stationID,
    },
    {
      where: {
        id,
      },
    }
  );
  res.send(`update thang cong id la:${id}`)
};

module.exports = {
  createTrip,
  getAll,
  deleteId,
  updateTrip
};
