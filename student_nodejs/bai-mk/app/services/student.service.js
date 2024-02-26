const { Student } = require("../model/index");

const getlist = async () => {
  const studentList = await Student.findAll();
  if (studentList) {
    return studentList;
  } else {
    return false;
  }
};

const getdetailByid = async (id) => {
  const getstudentID = await Student.findOne({
    where: {
      id: id,
    },
  });
  // const index = studentList.findIndex((student) => {
  //     return student.id == id;
  //   });
  if (getstudentID) {
    return getstudentID;
  } else {
    return false;
  }
};

const add = async (student) => {
  const newStudent = await Student.create(student);
  return newStudent;
};

const update = async (id, student) => {
  const updateStudent = await getdetailByid(id);
  if (updateStudent) {
    (updateStudent.fullname = student.fullname),
      (updateStudent.age = student.age),
      (updateStudent.numberClass = student.numberClass);

    const studentupdate = updateStudent.save();
    return studentupdate;
  } else {
    return false;
  }
};

const deleteByid = async (id) => {
  const deleteStrudent = await getdetailByid(id);
  if (deleteStrudent) {
    await Student.destroy({
      where: {
        id: id,
      },
    });
    return deleteStrudent;
  } else {
    return false;
  }
};

module.exports = {
  getlist,
  getdetailByid,
  add,
  update,
  deleteByid,
};
