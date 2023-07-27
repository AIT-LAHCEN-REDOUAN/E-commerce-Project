import React, { useState } from 'react'
import { Link, useNavigate} from 'react-router-dom'
import axios from 'axios';
import swal from 'sweetalert';
export default function Login() {

    const [email,setEmail]=useState('');
    const [password,setPassword]=useState('');
    const [errors,setErrors]=useState([]);
    const navigate=useNavigate();


    const login = (e) => {
        e.preventDefault();
        axios.post('http://127.0.0.1:8000/api/login', { email, password }).then(res => {
            console.log(res.data);
            if (res.data.status === 200) {
                setErrors([]);
                localStorage.setItem('auth_token', res.data.token);
                localStorage.setItem('auth_user', JSON.stringify(res.data.user));
                swal('Success', res.data.message, 'success');
                navigate('/');
            } else if (res.data.status === 401) {
                swal('Warning', res.data.message, 'warning');
            } else {
                setErrors(res.data.validation_errors);
            }
        })
    };
    return (
       
            <div className='bg-light text-center p-3 m-auto mt-5 w-25 container' >
                <div className='row'>
                    <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                    <p style={{ color: '#0266FD', fontSize: '25px' }} className="fw-bold w-100">Connexion </p>
                    </div>
                </div>
                <div className='row'>
                    <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                    <p style={{ color: '#A5A6A7', fontWeight: 'semi', fontSize:'17px' }} className='w-100'>Entrez votre email et votre mot de passe :</p>
                    </div>
                </div>
                <form onSubmit={login}>
                <div className='row'>
                    <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                    <input type='email' className='form-control m-auto mt-3 w-75' placeholder='Email'  onChange={(e)=>{setEmail(e.target.value)}}/>
                    <span>{errors.email}</span>
                    </div>
                </div>
                <div className='row'>
                    <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                    <input type='password' className='form-control m-auto mt-3 w-75' placeholder='Mot de passe'  onChange={(e)=>{setPassword(e.target.value)}}/>
                    <span>{errors.password}</span>
                    </div>
                </div>
                <div className='row'>
                    <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                    <button className='btn  text-light fw-bold mt-3 w-75' style={{ backgroundColor: '#FF6F0C'}} type='submit'>Se connecter</button>
                    </div>
                </div>
                       
                    </form>



        </div>
    )
}
