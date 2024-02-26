const { Users,sequelize } = require("../models");
const bcrypt = require('bcryptjs');
const jwt = require("jsonwebtoken");

const gravatar = require('gravatar');

const register = async (req, res) => {
    const { name, password, numberPhone, email ,type} = req.body;
    try {
        // tao avatar mac dinh
        const avatarURL = gravatar.url(email, { s: '200', r: 'pg', d: 'identicon' });
        const salt = bcrypt.genSaltSync(10);
        const hashpassword = bcrypt.hashSync(password, salt);
        const newUser = await Users.create({ email, name, password: hashpassword,type, numberPhone ,avatar:avatarURL || defaultAvatarURL});
        res.status(201).send(newUser);
    } catch (error) {
        res.status(500).send(error);
    }
};

const login = async (req, res) => {
    const { email, password } = req.body;
    // tìm user đang đăng nhậ dựa vào eamil
    const user = await Users.findOne({
        where: {
            email,
        }
    });
//kiểm tra mật khẩu có đúng hay không do nó có mã hóa nên ko dùng dấu === mà dùng bcrypt
    if (user) {
        const isAuth = bcrypt.compareSync(password, user.password);
        if (isAuth) {
            const token = jwt.sign({ email: user.email, type: user.type }, "thang-dai-03", { expiresIn: 60 * 60 });
            res.status(201).send({ message: "Đăng nhập thành công", token });
        } else {
            res.status(500).send("Đăng nhập thất bại");
        }
    } else {
        res.status(500).send("Không tìm thấy email");
    }
};

const uploadAvatar= async (req,res)=>{
    const {file}=req
    const urlImage=`http://localhost:3000/${file.path}`
    const {user}=req
    const userFound=await Users.findOne({
        email:user.email
    })
    userFound.avatar=urlImage
    await userFound.save()
    res.send(userFound)
}



const getAllTrip=async(req,res)=>{
    try {
        
        const[result]= await  sequelize.query(
        `SELECT * FROM vexere.trips;`
       )
       res.send(result)
    } catch (error) {
        res.status(500).send(error)
    }
}

module.exports = {
    register,
    login,
    uploadAvatar,
    getAllTrip
};
