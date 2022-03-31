function errorConnexion (){
    let login = document.forms["acceuilForm"]["login"].value;
    let pwd = document.forms["acceuilForm"]["pwd"].value;
    let errorLogin='';
    let errorPwd='';
    let check=true;

    //check du login

    if (login==''){
        errorLogin="Erreur : Pseudonyme manquant";
        check=false;
    }

    //check du password

    if (pwd==''){
        errorPwd="Erreur : Mot de passe manquant";
        check=false;
    }

    if (pwd==""||login==''){
        alert(errorLogin +'\n'+ errorPwd);
    }
    return check;
}

function errorSignin(){
    let name = document.forms['inscriptionForm']['name'].value;
    let fname = document.forms['inscriptionForm']['fname'].value;
    let email = document.forms['inscriptionForm']['email'].value;
    let login = document.forms['inscriptionForm']['login'].value;
    let pwd = document.forms['inscriptionForm']['pwd'].value;
    let confPwd = document.forms['inscriptionForm']['confPwd'].value;
    let errorName='',errorFname='',errorEmail='',errorLogin='',errorPwd='',errorConfpwd='',diffPwd='',regexPwd='';
    let checkMdp=0;
    let check=true;
    let reg=0;
    let regex=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

    if (name==''){
        errorName='Erreur : Nom manquant';
        check=false;
    }
    if (fname==''){
        errorFname='Erreur : Prénom manquant';
        check=false;
    }
    if (email==''){
        errorEmail='Erreur : Email manquant';
        check=false;
    }
    if (login==''){
        errorLogin='Erreur : Pseudonyme manquant';
        check=false;
    }
    if (pwd==''){
        errorPwd='Erreur : Mot de passe manquant';
        check=false;
    }
    if (regex.test(pwd)==false){
        regexPwd='Erreur : Le mot de passe doit contenir une majuscule, une minuscule, un chiffre et doit faire plus de 8 caractères';
        check=false;
        reg=1;
    }
    if (confPwd==''){
        errorConfpwd='Erreur : Confirmation de mot de passe manquant';
        check=false;
    }
    if (pwd != confPwd){
        checkMdp=1;
        diffPwd='Erreur : Les mots de passe sont différents';
        check=false;
    }


    if (name==''||fname==''||email==''||login==''||pwd==''||confPwd==''||checkMdp==1||reg==1){
        alert(errorName+'\n'+errorFname+'\n'+errorLogin+'\n'+errorPwd+'\n'+errorConfpwd+'\n'+diffPwd+'\n'+regexPwd);
    }
    return check;
}