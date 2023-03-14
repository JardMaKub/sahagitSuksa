function loginfaile() {
    alert("Invalid username or password.\nPlese try again.");
}

function showaleart($madi) {
    alert($madi);
}

// ------- validateform -------
function checkupdateaccmanageform() {
    var accid = document.getElementById("accid").value.trim();
    var accstid = document.getElementById("accstid").value.trim();
    var accname = document.getElementById("accname").value.trim();
    var accpass = document.getElementById("accpass").value.trim();

    if (accid == "") {
        alert("Plese get data from table first !!!");
        return false;
    }
    if (accstid == "" || accname == "" || accpass == "") {
        alert("Plese fill all the box !!!");
        return false;
    }
    if (accstid.length != 11) {
        alert("Student id must 11 digit !!!");
        return false;
    }
}
function checksaveaccmanageform() {
    var accstid = document.getElementById("accstid").value.trim();
    var accname = document.getElementById("accname").value.trim();
    var accpass = document.getElementById("accpass").value.trim();

    if (accstid == "" || accname == "" || accpass == "") {
        alert("Plese fill all the box !!!");
        return false;
    }
    if (accstid.length != 11) {
        alert("Student id must 11 digit !!!");
        return false;
    }
}

function checkupdatestd() {
    var std_id = document.getElementById("std_id").value.trim();
    var std_stdid = document.getElementById("std_stdid").value.trim();
    var std_name = document.getElementById("std_name").value.trim();
    var std_year = document.getElementById("std_year").value.trim();
    var std_tel = document.getElementById("std_tel").value.trim();


    if (std_id == "") {
        alert("Plese get data from table first !!!");
        return false;
    }
    if (std_name == "" ) {
        alert("Plese fill all the box !!!");
        return false;
    }
    if(std_year == "none"){
        alert("Please select years !!!");
        return false;
    }
    if (std_stdid.length != 11) {
        alert("Student id must 11 digit !!!");
        return false;
    }
    if (std_tel.length < 9) {
        alert("Student id must more than 8 digit !!!");
        return false;
    }
}
function checksavestd() {
    var std_stdid = document.getElementById("std_stdid").value.trim();
    var std_name = document.getElementById("std_name").value.trim();
    var std_year = document.getElementById("std_year").value.trim();
    var std_tel = document.getElementById("std_tel").value.trim();


    if (std_name == "") {
        alert("Plese fill all the box !!!");
        return false;
    }
    if (std_stdid.length != 11) {
        alert("Student id must 11 digit !!!");
        return false;
    }
    if (std_tel.length < 9) {
        alert("Telephone number must more than 8 digit !!!");
        return false;
    }
    if (std_year == "none") {
        alert("Plese selected year !!!");
        return false;
    }
}

function checkupdateorgmanageform() {
    var orgid = document.getElementById("orgid").value.trim();
    var orgorgid = document.getElementById("orgorgid").value.trim();
    var orgname = document.getElementById("orgname").value.trim();
    var orgcont = document.getElementById("orgcont").value.trim();
    var orgtel = document.getElementById("orgtel").value.trim();

    if (orgid == "") {
        alert("Plese get data from table first !!!");
        return false;
    }
    if (orgname == "" || orgcont == "" ) {
        alert("Plese fill all the box !!!");
        return false;
    }
    if (orgtel.length < 9) {
        alert("Telehone number must at least 9 digit !!!");
        return false;
    }
    if (orgorgid == "") {
        alert("Plese enter Organization ID !!!");
        return false;
    }
}
function checksaveorgmanageform() {
    var orgorgid = document.getElementById("orgorgid").value.trim();
    var orgname = document.getElementById("orgname").value.trim();
    var orgcont = document.getElementById("orgcont").value.trim();
    var orgprov = document.getElementById("orgprov").value.trim();
    var orgtel = document.getElementById("orgtel").value.trim();

    if (orgorgid == "" || orgname == "" || orgcont == "") {
        alert("Plese fill all the box !!!");
        return false;
    }
    if (orgprov == "none") {
        alert("Plese select province !!!");
        return false;
    }
    if (orgtel.length < 9) {
        alert("Telehone number must at least 9 digit !!!");
        return false;
    }
}

function checkupdateinternshipform() {
    var stdtn_id = document.getElementById("stdtn_id").value.trim();
    // var stdtn_year = document.getElementById("stdtn_year").value.trim();
    var org_orgid = document.getElementById("org_orgid").value.trim();
    var stdtn_stdid = document.getElementById("accpass").value.trim();

    if (stdtn_id == "") {
        alert("Plese get data from table first !!!");
        return false;
    }
    if (stdtn_stdid == "none" || org_orgid == "none" ){
        alert("Plese select student and organization !!!");
        return false;
    }
    // if (stdtn_stdid.length != 11) {
    //     alert("Student id must 11 digit !!!");
    //     return false;
    // }
}
function checksaveinternshipform() {
    var stdtn_id = document.getElementById("stdtn_id").value.trim();
    var stdtn_year = document.getElementById("stdtn_year").value.trim();
    var stdtn_stdid = document.getElementById("stdtn_stdid").value.trim();
    var org_orgid = document.getElementById("org_orgid").value.trim();

    if (stdtn_id != "") {
        alert("Plese clear form first !!!");
        return false;
    }
    if (stdtn_year == "none"){
        alert("Plese select year");
        return false;
    }
    if (stdtn_stdid == "none" || org_orgid == "none") {
        alert("Plese select student and organization !!!");
        return false;
    }
    // if (stdtn_stdid.length != 11) {
    //     alert("Student id must 11 digit !!!");
    //     return false;
    // }
}


// ------- cleanform -------
function cleanformaccmanage() {
    if (confirm('Clean form ?')) {
        var accid = document.getElementById("accid");
        var accstid = document.getElementById("accstid");
        var accname = document.getElementById("accname");
        var accpass = document.getElementById("accpass");
        accid.value = "";
        accstid.value = "";
        accname.value = "";
        accpass.value = "";
    }

}
function cleanformstd() {
    if (confirm('Clean form ?')) {
        var std_id = document.getElementById("std_id");
        var std_stdid = document.getElementById("std_stdid");
        var std_name = document.getElementById("std_name");
        var std_year = document.getElementById("std_year");
        var std_tel = document.getElementById("std_tel");
        std_id.value = "";
        std_stdid.value = "";
        std_name.value = "";
        std_tel.value = "";
        std_year.innerHTML = "<option selected value=\"none\">-- Select --</option>"+
            "<option value=\"1\">1</option>"+
            "<option value=\"2\">2</option>"+
            "<option value=\"3\">3</option>"+
            "<option value=\"4\">4</option>";
    }
    // $std_id  = $_POST["std_id"];
    // $std_stdid  = $_POST["std_stdid"];
    // $std_name  = $_POST["std_name"];
    // $std_year  = $_POST["std_year"];
    // $std_type  = $_POST["std_type"];
    // $std_tel  = $_POST["std_tel"];

}
function cleanformorgmanage() {
    if (confirm('Clean form ?')) {
        var orgid = document.getElementById("orgid");
        var orgorgid = document.getElementById("orgorgid");
        var orgname = document.getElementById("orgname");
        var orgadd = document.getElementById("orgadd");
        var orgcont = document.getElementById("orgcont");
        var orgtel = document.getElementById("orgtel");
        orgid.value = "";
        orgorgid.value = "";
        orgname.value = "";
        orgadd.value = "";
        orgcont.value = "";
        orgtel.value = "";
    }

}
function cleanforminternship() {
    if (confirm('Clean form ?')) {
        var stdtn_id = document.getElementById("stdtn_id");
        var org_orgid = document.getElementById("org_orgid");
        var stdtn_stdid = document.getElementById("stdtn_stdid");
        var stdtn_jobdesc = document.getElementById("stdtn_jobdesc");
        var stdtn_reason = document.getElementById("stdtn_reason");
        var stdtn_id_name = document.getElementById("stdtn_id_name");

        stdtn_id.value = "";
        org_orgid.value = "";
        stdtn_stdid.value = "";
        stdtn_jobdesc.value = "";
        stdtn_reason.value = "";
        stdtn_id_name.value = "";
    }

}


// ------- ajax -------
function Init_AJAX() {
    try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) { }
    try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) { }
    try { return new XMLHttpRequest(); } catch (e) { }
    alert("XMLHttpRequest not supported");
    return null;
}

function doviewdataaccmanage() {
    var el1 = document.getElementById("showhere");

    el1.style.display = '';

    var req = Init_AJAX();
    req.open("GET", "./admin_accmanageload.php", false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1)
            el1.innerHTML = contents[1];
        else alert(result);
    } else alert('Can not connect to server!!!');
}
function dogetdataaccmanage(getedID) {
    var accid = document.getElementById("accid");
    var accstid = document.getElementById("accstid");
    var accname = document.getElementById("accname");
    var accpass = document.getElementById("accpass");
    // accstate
    var accstatead = document.getElementById("accstatead");
    var accstatestd = document.getElementById("accstatestd");

    accid.value = '';
    accstid.value = '';
    accname.value = '';
    accpass.value = '';


    var req = Init_AJAX();
    req.open("GET", "./admin_accmanagegetdata.php?gededID=" + getedID, false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1) {
            var realcon = contents[1].split(",,");
            accid.value = realcon[0];
            accstid.value = realcon[1];
            accname.value = realcon[2];
            accpass.value = realcon[3];
            if (realcon[4] == 1) {
                accstatead.checked = true;
            } else {
                accstatestd.checked = true;
            }
        } else alert(result);
    } else alert('Can not connect to server!!!');
}

function doviewdataorgmanage(){
    var el1 = document.getElementById("showhere");

    el1.style.display = '';

    var req = Init_AJAX();
    req.open("GET", "./admin_orgmanageload.php", false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1)
            el1.innerHTML = contents[1];
        else alert(result);
    } else alert('Can not connect to server!!!');
}
function dogetdataorgmanage(getedID) {
    var orgid = document.getElementById("orgid");
    var orgorgid = document.getElementById("orgorgid");
    var orgname = document.getElementById("orgname");
    var orgadd = document.getElementById("orgadd");
    var orgprov = document.getElementById("orgprov");
    var orgcont = document.getElementById("orgcont");
    var orgtel = document.getElementById("orgtel");

    orgid.value = '';
    orgorgid.value = '';
    orgname.value = '';
    orgadd.value = '';
    orgcont.value = '';
    orgtel.value = '';

    orgprov.value = '';
    orgprov.innerHTML='';


    var req = Init_AJAX();
    req.open("GET", "./admin_orgmanagegetdata.php?gededID=" + getedID, false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1) {
            var realcon = contents[1].split(",,");
            orgid.value = realcon[0];
            orgorgid.value = realcon[1];
            orgname.value = realcon[2];
            orgadd.value = realcon[3];
            orgcont.value = realcon[4];
            orgtel.value = realcon[5];

            
            orgprov.value = realcon[6];
            orgprov.innerHTML = "<option selected value=\""+realcon[6]+"\">"+realcon[6]+"</option>"+
            "<option value=\"Ubonrachatani\">Ubonrachatani</option>"+
            "<option value=\"Surin\">Surin</option>"+
            "<option value=\"Bankkok\">Bankkok</option>"+
            "<option value=\"Konkhen\">Konkhen</option>";

        } else alert(result);
    } else alert('Can not connect to server!!!');
}

function doviewstd() {
    var el1 = document.getElementById("showhere");

    el1.style.display = '';

    var req = Init_AJAX();
    req.open("GET", "./admin_studentload.php", false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1)
            el1.innerHTML = contents[1];
        else alert(result);
    } else alert('Can not connect to server!!!');
}
function dogetdatastd(getedID) {
    var std_id = document.getElementById("std_id");
    var std_stdid = document.getElementById("std_stdid");
    var std_name = document.getElementById("std_name");
    var std_year = document.getElementById("std_year");
    var std_tel = document.getElementById("std_tel");

    // accstate
    var std_type_1 = document.getElementById("std_type_1");
    var std_type_2 = document.getElementById("std_type_2");

    std_id.value = '';
    std_stdid.value = '';
    std_name.value = '';
    std_year.value = '';
    std_year.innerHTML = ''
    // std_type.value = '';
    std_tel.value = '';


    var req = Init_AJAX();
    req.open("GET", "./admin_studentgetdata.php?gededID=" + getedID, false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1) {
            var realcon = contents[1].split(",,");
            std_id.value = realcon[0];
            std_stdid.value = realcon[1];
            std_name.value = realcon[2];
            std_year.value = realcon[3];
            std_year.innerHTML = "<option selected value=\""+realcon[3]+"\">"+realcon[3]+"</option>"+
            "<option value=\"1\">1</option>"+
            "<option value=\"2\">2</option>"+
            "<option value=\"3\">3</option>"+
            "<option value=\"4\">4</option>";
            if (realcon[4] == 1) {
                std_type_1.checked = true;
            } else {
                std_type_2.checked = true;
            }
            std_tel.value = realcon[5];
        } else alert(result);
    } else alert('Can not connect to server!!!');
}

function doviewdatainternship() {
    var el1 = document.getElementById("showhere");

    el1.style.display = '';

    var req = Init_AJAX();
    req.open("GET", "./admin_internshipload.php", false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1)
            el1.innerHTML = contents[1];
        else alert(result);
    } else alert('Can not connect to server!!!');
}
function dogetdatainternship(getedID) {
    var stdtn_id = document.getElementById("stdtn_id");
    var stdtn_id_name = document.getElementById("stdtn_id_name");
    var stdtn_year = document.getElementById("stdtn_year");
    var org_orgid = document.getElementById("org_orgid");
    var stdtn_stdid = document.getElementById("stdtn_stdid");
    // stdtn_type
    var stdtn_type_2 = document.getElementById("stdtn_type_2");
    var stdtn_type_4 = document.getElementById("stdtn_type_4");
    // --------------------------
    var stdtn_jobdesc = document.getElementById("stdtn_jobdesc");
    // stdtn_type
    var stdtn_status_p = document.getElementById("stdtn_status_p");
    var stdtn_status_in = document.getElementById("stdtn_status_in");
    var stdtn_status_f = document.getElementById("stdtn_status_f");
    // --------------------------
    var stdtn_reason = document.getElementById("stdtn_reason");
    
    stdtn_id.value = '';
    // stdtn_id_name.value = '';
    stdtn_year.value = '';
    stdtn_year.innerHTML = '';
    org_orgid.value = '';
    stdtn_stdid.value = '';
    // stdtn_type.value = '';
    stdtn_jobdesc.value = '';
    // stdtn_status.value = '';
    stdtn_reason.value = '';

    var req = Init_AJAX();
    req.open("GET", "./admin_internshipgetdata.php?gededID=" + getedID, false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1) {
            var realcon = contents[1].split(",,");
            stdtn_id.value = realcon[0];
            stdtn_year.value = realcon[1];
            stdtn_year.innerHTML = "<option selected value=\""+realcon[1]+"\">"+realcon[1]+"</option>"+
            "<option value=\"2559\">2559</option>"+
            "<option value=\"2560\">2560</option>"+
            "<option value=\"2561\">2561</option>"+
            "<option value=\"2562\">2562</option>"+
            "<option value=\"2563\">2563</option>"+
            "<option value=\"2564\">2564</option>"+
            "<option value=\"2565\">2565</option>"+
            "<option value=\"2566\">2566</option>"+
            "<option value=\"2567\">2567</option>"+
            "<option value=\"2568\">2568</option>"+
            "<option value=\"2569\">2569</option>"+
            "<option value=\"2570\">2570</option>";

            org_orgid.value = realcon[2];
            stdtn_stdid.value = realcon[3];

            if (realcon[4] == 1) {
                stdtn_type_2.checked = true;
            } else{
                stdtn_type_4.checked = true;
            }

            stdtn_jobdesc.value = realcon[5];

            if (realcon[6] == 1) {
                stdtn_status_p.checked = true;
            } else if (realcon[6] == 2){
                stdtn_status_in.checked = true;
            } else{
                stdtn_status_f.checked = true;
            }

            stdtn_reason.value = realcon[7];
            stdtn_id_name.value = realcon[8];
        } else alert(result);
    } else alert('Can not connect to server!!!');
}


function search_get(){
    var search = document.getElementById("searchin").value;
    var soption = document.getElementById("soption").value;
    if (search.trim() == ""){
        alert("Plese enter keyword !!!");
        return false;
    }
    if (soption == "none"){
        alert("Plese choose search option !!!");
        return false;
    }
    // alert(checksearch + " :: " + checksoption);
    // --- end error checking ---


    var el1 = document.getElementById("showsearch");

    el1.style.display = '';

    var req = Init_AJAX();
    req.open("GET", "./admin_searchload.php?option="+soption+"&sid="+search, false);
    req.send(null);

    if ((req.readyState == 4 || req.readyState == "complete") && (req.status == 200)) {
        result = req.responseText;
        contents = result.split(String.fromCharCode(5));

        if (contents[0] == 1)
            el1.innerHTML = contents[1];
        else alert(result);
    } else alert('Can not connect to server!!!');

}


