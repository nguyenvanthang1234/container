// cai npm install moi chya thu vien css

// call api
const getStudentList = async () => {
  const res = await axios({
    method: "GET",
    url: `http://localhost:7000/student`,
  
  });
  return res.data;
};

const getStudentDetail = async (id) => {
  const res = await axios({
    method: "GET",
    url: `http://localhost:7000/student/${id}`,
   
  });
  return res.data;
};

const createStudent = async (student) => {
  const res = await axios({
    method: "POST",
    url: `http://localhost:7000/add`,
    data: student,
  });
  return res.data;
};

const updateStudent = async (id, student) => {
  const res = await axios({
    method: "PUT",
    url: `http://localhost:7000/update/${id}`,
    data: student,
  });
  return res.data;
};

const deleteStudent = async (id) => {
  const res = await axios({
    method: "DELETE",
    url: `http://localhost:7000/delete/${id}`,
   
  });
  return res.data;
  //   $("#modalMessage").modal("show");
  //   await getStudentList();
};

export {
  getStudentList,
  getStudentDetail,
  createStudent,
  updateStudent,
  deleteStudent,
};
