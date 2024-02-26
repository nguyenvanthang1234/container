const mkdirp  = require('mkdirp')
const multer  = require('multer')

const uploadImage=(type)=>{
    const made = mkdirp.sync(`../public/${type}`)
    const storage=multer.diskStorage({
            destination: function(req,file ,cb){
                cb(null,`../public/${type}`)//set up cho can luu
        
            },
            filename:function(req,file,cb){
                cb(null,Date.now()+"_"+file.originalname)// dat duoi file
            }
        })
        
        const upload=multer({storage:storage,
            fileFilter:function(req,file,cb){
                const extensionImage=[".jpg",".png"]
                const extension=file.originalname.slice(-4);
                const check=extensionImage.includes(extension)
                if(check){
                    cb(null,true)
        
                }else{
        
                    cb(new Error("duoi file ko hop le"))
                }
        
        }})

        return upload.single(type)
}

module.exports={
    uploadImage
}