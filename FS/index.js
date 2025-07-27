/*
128
Listando arquivos com FS e Recursão mútua
*/

const fs = require('fs').promises;
const path = require('path');

async function readdir(rootDir){
    rootDir = rootDir || path.resolve(__dirname);
    const files = await fs.readdir(rootDir);
    walk(files, rootDir);
}

async function walk(files, rootDir){
    for(let file of files){
        const fileFullPath = path.resolve(rootDir, file);
        const stats = await fs.stat(fileFullPath);

        if(/\.node_modules/g.test(fileFullPath)) continue;
        // Aqui está ignorando a pasta node_modules

        if(stats.isDirectory()){
            readdir(fileFullPath);
            continue;
        }
        console.log(fileFullPath);
    }
}

readdir('C:\\Users\\User\\Documents\\rms\\javaAula\\');