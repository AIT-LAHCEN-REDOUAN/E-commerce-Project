import React, { useState } from 'react'
import './ProfileStyle.css'
import axios from 'axios';
import swal from 'sweetalert';
import { useNavigate } from 'react-router';
export default function Profile() {
    const [fullname,setFullname]=useState(JSON.parse(localStorage.getItem('auth_user')).name);
    const [email,setEmail]=useState(JSON.parse(localStorage.getItem('auth_user')).email)
    const [phone,setPhone]=useState('');
    const [address,setAdress]=useState('');
    const [code_postal,setCode_postal]=useState('');
    const [pays,setPays]=useState('');
    const [region,setRegion]=useState('');
    const [errors,setErros]=useState([])
    const navigate=useNavigate()

    const compte=(e)=>{
        e.preventDefault();
        fetch('http://127.0.0.1:8000/api/compte',{
            method:'post',
            headers:{
                'Accept': 'application/json',
              'Content-Type': 'application/json'
            },
            body:JSON.stringify({fullname,phone,address,code_postal,pays,region,email,old_email:JSON.parse(localStorage.getItem('auth_user')).email})
        }).then(response=>{
            return response.json()
        }).then(res=>{
            console.log(res)
            if(res.status===200){
                        swal('Success',res.message,'Success');
                        setErros([]);
                       navigate('/');
                    }else{
                        setErros(res.validation_errors);
                    }

        })
    //     axios.post('http://127.0.0.1:8000/api/compte',{fullname,phone,address,code_postal,pays,region,email}).then(res=>{
    //     if(res.data.status===200){
    //         swal('Success',res.data.message,'Success');
    //         setErros([]);
    //        // navigate('/');
    //     }else{
    //         setErros(res.data.validation_errors);
    //     }
    // }
    // )
    }
  return (
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"/><span class="font-weight-bold">{fullname}</span><span class="text-black-50">{email}</span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form onSubmit={compte}>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Full Name</label>
                        <input type="text" class="form-control" placeholder="Full name" value={fullname} onChange={(e)=>{setFullname(e.target.value)}}/>
                        <span>{errors.fullname}</span>
                        </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label>
                    <input type="text" class="form-control" placeholder="enter phone number" value={phone} onChange={(e)=>{setPhone(e.target.value)}}/>
                    <span>{errors.phone}</span>
                    </div>
                    <div class="col-md-12"><label class="labels">Address Line </label>
                    <input type="text" class="form-control" placeholder="enter address line " value={address} onChange={(e)=>{setAdress(e.target.value)}}/>
                    <span>{errors.address}</span>
                    </div>
                    <div class="col-md-12"><label class="labels">Postcode</label>
                    <input type="text" class="form-control" placeholder="enter post code" value={code_postal} onChange={(e)=>{setCode_postal(e.target.value)}}/>
                    <span>{errors.code_postal}</span>
                    </div>
                    <div class="col-md-12"><label class="labels">Email</label>
                    <input type="text" class="form-control" placeholder="enter email" value={email} onChange={(e)=>{setEmail(e.target.value)}}/>
                    <span>{errors.email}</span>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="col-md-6"><label class="labels">Country</label>
                <input type="text" class="form-control" placeholder="country" value={pays} onChange={(e)=>{setPays(e.target.value)}}/>
                <span>{errors.pays}</span>
                </div>
                    <div class="col-md-6"><label class="labels">State/Region</label>
                    <input type="text" class="form-control" value={region} placeholder="state" onChange={(e)=>{setRegion(e.target.value)}}/>
                    <span>{errors.region}</span>
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button"  type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
     
    </div>
</div>

  )
}
