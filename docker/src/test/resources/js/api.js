"use strict"

const send = (method,uri,data={}) => {
    const url = 'localhost:8081' + uri
    return new Promise((resolve)=>{
        var xhr = new XMLHttpRequest();
        xhr.open(method, url);
        xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
        xhr.onload = () => {
            try{
                const res_json = JSON.parse(xhr.responseText)
                resolve(res_json)
            }catch (e) {
                resolve(xhr.responseText)
            }
        }
        xhr.onerror = () => {
            console.log(xhr.status);
            console.log("error!");
        };
        xhr.send(data);
    })
}

const api = {
    getPaperList(){
        return send("GET","/api/main");
    },
    postPaper(paper){
        return send("POST","/api/main",paper);
    },
    updatePaper(id,paper){
        return send("PUT","/api/main/" + id,paper);
    },
    deletePaper(id,data){
        return send("DELETE","/api/main/" + id,data);
    }
}

export default api
