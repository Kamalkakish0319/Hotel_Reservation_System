var uname;
var user_id;
var m_id;
var f_name;
var l_name;
var m_email;
var m_date;
var m_pass;
var c_id;
var f_name2;
var l_name2;
var r_num;
var c_in;
var c_out;
var r_type;
var b_type;
var cost;




function book_hotel(){

    if (document.cookie.split(';').some((item) => item.trim().startsWith('uid='))) {
    user_id = document.cookie
        .split('; ')
        .find(row => row.startsWith('uid='))
        .split('=')[1];
      console.log(user_id);

    var check_in = document.getElementById("check-in");
    var currentVal_in = check_in.value;
    console.log(currentVal_in);

    var check_out = document.getElementById("check-out");
    var currentVal_out = check_out.value;
    console.log(currentVal_out);

    var room_type = document.getElementById("room_type");
    var room_type_num = room_type.value;
    console.log(room_type_num);


    var data1 = {c_in:currentVal_in,c_out:currentVal_out,user:user_id,room_type:room_type_num};
    $.ajax({
        type: 'POST',
        url: 'book_room.php',
        data: data1,
        
        success: function(response)
    {
        console.log(response);
       alert(response);
    },
    
    error: function (response)
    {
    console.log(response);
    }
    });
}else{
    alert("Please Login")
}
}


function register(){
    var fname = document.getElementById("fname");
    var fname_value = fname.value;
    console.log(fname_value);

    var lname = document.getElementById("lname");
    var lname_value = lname.value;
    console.log(lname_value);

    var email = document.getElementById("email");
    var email_value = email.value;
    console.log(email_value);

    var password = document.getElementById("password");
    var password_value = password.value;
    console.log(password_value);


    var formData = {fName:fname_value,lName:lname_value,mEmail:email_value,mPassword:password_value};
    $.ajax({
        type: 'POST',
        url: 'register.php',
        data: formData,
        
        success: function(response)
    {
        console.log(response);
        alert(response);
    },
    
    error: function (response)
    {
    console.log(response);
    }
    });
  



}

function login() {
    let username = prompt("Login to DB:");
    let password = prompt("Please enter password:");

    

         var formData = {username:username,password:password};
             $.ajax({
                type: 'POST',
                url: 'loginold.php',
                data: formData,
                dataType : 'json',
        
        success: function(data,textStatus,jqXHR)
    {   

        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 1000*36000;
        now.setTime(expireTime);

        uuid = (data['uid']);

        uname = (data['name']);


        document.cookie = 'uid='+uuid+';expires='+now.toUTCString()+';path=/';
        document.cookie = 'name='+uname+';expires='+now.toUTCString()+';path=/';


        


        alert(uname + " has been logged into system.");

        console.log(data);
        cookies = document.cookie;
        console.log(cookies);

        location.reload();
    },
    
    error: function (data)
    {
    alert(data.responseText);
    }
    });           

}

function logout() {
    
    
    document.cookie = 'uid=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
    document.cookie = 'name=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';

    

alert("Successful Logout.");
location.reload();

}


function member_details(){
    if (document.cookie.split(';').some((item) => item.trim().startsWith('uid='))) {

    user_id = document.cookie
        .split(';')
        .find(row => row.startsWith('uid='))
        .split('=')[1];
        
      console.log(user_id);

    var dataU = {uid:user_id};
             $.ajax({
                type: 'POST',
                url: 'member.php',
                data: dataU,
                dataType : 'json',
        
        success: function(data,textStatus,jqXHR)
    {   

       console.log(data[0]);

       console.log(data[0].id)
       m_id = data[0].id;

       console.log(data[0].first_name)
       f_name = data[0].first_name;

       console.log(data[0].last_name)
       l_name = data[0].last_name;

       console.log(data[0].date_created)
       m_date = data[0].date_created;

       console.log(data[0].email)
       m_email = data[0].email;

       console.log(data[0].password)
       m_pass = data[0].password;

      set_details();



    },
    
    error: function (data)
    {
    alert(data);
    }
    });           

    }else{
        alert("Please login to view member details")
    }

}
function set_details(){


    document.getElementById('uid').innerHTML = m_id;

    document.getElementById('fname').innerHTML = f_name;

    document.getElementById('lname').innerHTML = l_name;

    document.getElementById('date').innerHTML = m_date;

    document.getElementById('email').innerHTML = m_email;

    document.getElementById('password').innerHTML = m_pass;

}

function room_details(){
    if (document.cookie.split(';').some((item) => item.trim().startsWith('uid='))) {
    user_id = document.cookie
        .split(';')
        .find(row => row.startsWith('uid='))
        .split('=')[1];
      console.log(user_id);

    var dataD = {uid:user_id};
             $.ajax({
                type: 'POST',
                url: 'room_details.php',
                data: dataD,
                dataType : 'json',
        
        success: function(data,textStatus,jqXHR)
    {   

       console.log(data[0]);

       console.log(data[0].c_id)
       c_id = data[0].c_id;

       console.log(data[0].first_name)
       f_name2 = data[0].first_name;

       console.log(data[0].last_name)
       l_name2 = data[0].last_name;

       console.log(data[0].room_number)
       r_num = data[0].room_number;

       console.log(data[0].check_in)
       c_in = data[0].check_in;

       console.log(data[0].check_out)
       c_out= data[0].check_out;

       console.log(data[0].room_type)
       r_type= data[0].room_type;

       console.log(data[0].bed_type)
       b_type= data[0].bed_type;

       console.log(data[0].cost_per_night)
       cost = data[0].cost_per_night;
       

      setroom_details();

        

    },
    
    error: function (data)
    {
        alert("book a room to see details")
    }
    });           

}else{
    alert("Please login to view member details")
}

}

function setroom_details(){


    document.getElementById('rid').innerHTML = c_id;

    document.getElementById('fname').innerHTML = f_name2;

    document.getElementById('lname').innerHTML = l_name2;

    document.getElementById('r_num').innerHTML = r_num;

    document.getElementById('check_in').innerHTML = c_in;

    document.getElementById('check_out').innerHTML = c_out;

    document.getElementById('r_type').innerHTML = r_type;

    document.getElementById('b_type').innerHTML = b_type;

    document.getElementById('cost').innerHTML = cost;

}



function cancel_stay(){

    user_id = document.cookie
        .split('; ')
        .find(row => row.startsWith('uid='))
        .split('=')[1];
      console.log(user_id);

    
    var data3 = {user:user_id};
    $.ajax({
        type: 'POST',
        url: 'cancel_stay.php',
        data: data3,
        
        success: function(response)
        
    {
        console.log(response);
       alert(response);
       location.reload();
    },
    
    error: function (response)
    {
    console.log(response);
    }
    });
}