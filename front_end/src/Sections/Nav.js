import React, { useEffect, useState } from 'react'
import logo from './logo.jpg'
import { Link, useNavigate } from 'react-router-dom'
import swal from 'sweetalert'
import axios from 'axios'
import './Style.css'

function Nav() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [errors, setErrors] = useState([]);
    const [count,setCount]=useState(0);
    const navigate = useNavigate();

    useEffect(() => {
        if (localStorage.getItem('auth_user') !== null) {
          const user = JSON.parse(localStorage.getItem('auth_user')).email;
          fetch(`http://127.0.0.1:8000/api/panier/${user}`)
            .then(res => res.json())
            .then(response => {
              setCount(response.panier.length);
            }
            )
        } else {
          setCount(0)
        }
      }, [navigate])

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

    const logout = () => {
        fetch('http://127.0.0.1:8000/api/logout', {
            method: 'get',
            /* headers are important*/
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('auth_token')
            }
        }).then(response => {
            return response.json();
        })
            .then(res => {
                if (res.status === 200) {
                    localStorage.removeItem('auth_token', res.token);
                    localStorage.removeItem('auth_user', res.user);
                    swal('Success', res.message, 'success');
                    navigate('/');
                }
            })

    }

    var AuthButton = '';
    if (!localStorage.getItem('auth_token')) {
        AuthButton = (
            <li className='nav-item dropdown   col-12 col-sm-3 col-md-3 col-lg-3 border-end' id='login'>
                <a class="nav-link w-100" data-bs-toggle='dropdown'>
                    <span style={{ color: 'lightgray', fontSize: "0.9vw" }} className='w-100'>Connexion / Inscription</span> <br /><button className='fw-bold text-light btn  p-0 w-100' style={{ fontSize: "1.1vw" }}>Mon compte</button>
                </a>
                <ul class="dropdown-menu  mt-2 bg-light text-center p-2 " style={{ width: '110%' }}>
                    <div className='row '>
                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                            <p style={{ color: '#0266FD', fontSize: '20px' }} className="fw-bold w-100">Connexion </p>
                        </div>
                    </div>
                    <div className='row'>
                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                            <p style={{ color: '#A5A6A7', fontWeight: 'semi', finSize: '20px' }} className='w-100'>Entrez votre email et votre mot de passe :</p>
                        </div>
                    </div>
                    <form onSubmit={login}>
                        <div className='row'>
                            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                <input type='email' className='form-control m-auto w-100' placeholder='Email' style={{ width: '250px' }} onChange={(e) => { setEmail(e.target.value) }} />
                                <span>{errors.email}</span>
                            </div>
                        </div>
                        <div className='row'>
                            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                <input type='password' className='form-control m-auto mt-3 w-100' placeholder='Mot de passe' style={{ width: '250px' }} onChange={(e) => { setPassword(e.target.value) }} />
                                <span>{errors.password}</span>
                            </div>
                        </div>
                        <div className='row'>
                            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                <button className='btn  text-light fw-bold mt-3 w-100' type='submit' style={{ backgroundColor: '#FF6F0C', width: '250px' }}>Se connecter</button>
                            </div>
                        </div>
                    </form>
                    <div className='row'>
                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                            <p style={{ color: '#A5A6A7', fontSize: '12px' }} className='mt-3 w-100'>Nouveau client ? <Link to='/CreationCompte' style={{ color: '#17BAE0', textDecoration: 'none' }}>Creez votre compte</Link></p>
                        </div>
                    </div>
                    <div className='row'>
                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                            <p style={{ color: '#A5A6A7', fontSize: '12px' }} className='w-100'>Mot de passe perdu ? <Link style={{ color: '#17BAE0', textDecoration: 'none' }} to='MotDePassPerdu'>Recuperer mon mot <br />de passe</Link>  </p>
                        </div>
                    </div>

                </ul>

            </li>
        )
    } else {
        AuthButton = (<li className='nav-item dropdown  col-12 col-sm-3 col-md-3 col-lg-3 border-end'>
            <a class="nav-link w-100" data-bs-toggle='dropdown'>
                <span style={{ fontSize: "1.2vw" }} className='w-100 fw-bold text-light'>Profile</span>
            </a>
            <ul class="dropdown-menu  mt-4 bg-light text-center p-2 " style={{ width: '100%' }}>
                <Link className='nav-link text-primary fw-bold' to='/profile'>{JSON.parse(localStorage.getItem('auth_user')).name}</Link>
                <Link className='nav-link fw-bold text-danger' onClick={logout}>Déconnexion</Link>
            </ul>
        </li>)
    }

    return (
        <div >
            <nav className='navbar nav navbar-expand-sm navbar-expand-md navbar-expand-lg ' style={{ backgroundColor: "#0266FD" }}>
                <div className='row w-100'>
                    <div className='col-4 col-sm-2 col-md-2 col-lg-2 text-center'>
                        <Link to='/' className='navbar-brand nav-link ms-5 p-0 m-0'>
                            <img src='images/LOGOPFE1.png' width='80px' height='auto' className='rounded p-0 m-0 bg-light' style={{ boxShadow: '3px 3px 20px black' }} />
                        </Link>
                    </div>

                    <div className='col-8 col-sm-10 col-md-10 col-lg-10  '>
                        <div className='row  text-center'>

                            <div className='col-10 col-sm-10 col-md-10 col-lg-10  w-100'>
                                <div class="collapse navbar-collapse " id="mynav">
                                    <ul className='nav navbar-nav  w-100 justify-content-center '>
                                        <div className='row  w-100 align-items-center'>
                                            <li className='nav-item   col-12 col-sm-3 col-md-3 col-lg-3 '>
                                                <div className='input-group ms-2 w-100'>
                                                    <input type='search' placeholder='Recherche...' className='form-control w-80' />
                                                    <span className='input-group-text bg-info btn'><i class="bi bi-search w-20"></i></span>
                                                </div>
                                            </li>
                                            <li className='nav-item dropdown  col-12 col-sm-3 col-md-3 col-lg-3 border-end'>
                                                <a class="nav-link w-100" data-bs-toggle='dropdown'>
                                                    <span style={{ color: 'lightgray', fontSize: "0.9vw" }} className='w-100'>Services Client</span> <br /><button className='fw-bold text-light btn btn-sm p-0 m-0 w-100' style={{ fontSize: "1vw" }}>(+212) 617 78 06 20</button>
                                                </a>

                                                <ul class="dropdown-menu  mt-2 bg-light text-center p-2" style={{ width: "100%" }} >

                                                    <div className='row'>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <p style={{ color: '#0266FD', fontSize: "1.1vw" }} className="fw-bold">Applez-nous au </p>

                                                        </div>
                                                    </div>
                                                    <div className='row'>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <p style={{ color: 'gray', fontWeight: 'bolder', fontSize: "1vw" }}>0617780620</p>

                                                        </div>
                                                    </div>
                                                    <div className='row'>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <p style={{ color: '#0266FD', fontSize: "1.1vw" }} className="fw-bold">Contactez-nous</p>

                                                        </div>
                                                    </div>
                                                    <div className='row'>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <Link className='btn  text-light fw-bold' to='/Contacter' style={{ backgroundColor: '#FF6F0C', textDecoration: 'none', fontSize: "1.2vw" }}>Envoyer un message</Link>
                                                        </div>
                                                    </div>

                                                </ul>

                                            </li>

                                            {AuthButton}

                                            <li className='nav-item   col-12 col-sm-3 col-md-3 col-lg-3  '>
                                                <a class="nav-link w-100">
                                                    <div className='d-flex  justify-content-center align-items-center w-100'>
                                                        {count>0 ?
                                                            <i class="bi bi-cart3 text-light position-relative" style={{ fontSize: '2vw' }}>
                                                            <span class="position-absolute  start-100 translate-middle badge rounded-pill bg-danger " style={{ fontSize: '0.8vw',top:'12px' }}>
                                                                {count}      
                                                            </span>
                                                        </i>
                                                        :
                                                        <i class="bi bi-cart3 text-light" style={{ fontSize: '2vw' }}> </i>
                                                        }
                                                        <Link className='text-light fw-bold mt-1 ms-1 btn nav-link' to='/Panier' style={{ fontSize: '1.2vw' }}>Panier</Link>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>

                            <div className='col-2 col-sm-2 col-md-2 col-lg-2 '>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon btn"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </nav>
            {/*-------------------------------------------------------------------- NAV 2 ------------------------------------------------------------------------- */}

            <nav className='navbar nav navbar-expand-sm navbar-expand-md navbar-expand-lg bg-light' style={{ boxShadow: '1px 1px lightgray' }}>
                <ul className='nav navbar-nav w-100 '>
                    <div className='row w-100 container mx-auto w-100'>
                        {/*-----------pc portable----------1 */}
                        <li className='nav-item dropdown col-3 col-sm-3 col-md-3 col-lg-3' >
                            <a class="nav-link dropdown-toggle w-100" data-bs-toggle='dropdown'>
                                <span className='p-0 m-0 w-100' style={{ fontSize: "1.1vw" }}>Pc Portable</span>
                            </a>

                            <ul class="dropdown-menu p-3 nav2 border-0" style={{ color: "#393D32", width: "100%" }}>
                                <li className='w-100'><Link to='/PC_Portable_Gamer' className='nav-link w-100' style={{ fontSize: "1vw" }}>PC Portable Gamer</Link></li>
                                <li className='w-100'><Link to='/PC_Portable_Multimédia' className='nav-link w-100' style={{ fontSize: "1vw" }}>PC Portable Multimédia</Link></li>
                                <li className='w-100'><Link to='/Sac_ordinateur_portable' className='nav-link w-100' style={{ fontSize: "1vw" }}>Sac Ordinateur Portable</Link></li>

                            </ul>

                        </li>
                        {/*-----------composants----------2 */}
                        <li className='nav-item dropdown  col-3 col-sm-3 col-md-3 col-lg-3 '>
                            <a class="nav-link dropdown-toggle w-100" data-bs-toggle='dropdown'>
                                <span className='p-0 m-0 w-100' style={{ fontSize: '1.1vw' }}>Composants</span>
                            </a>

                            <ul class="dropdown-menu  nav2 border-0 w-100">
                                <div className='row '>
                                    <div className='col-6 col-sm-6 col-md-6 col-lg-6'>
                                        <ul style={{ listStyleType: "none" }} className='w-100'>
                                            {/*</div></div>><li style={{ color: "#0266FD",fontSize:"1.1vw" }} className='ps-2 w-100 fw-bold'>Processeur</li>*/}
                                            <li ><Link to='/Processeur' className='nav-link w-100' style={{ fontSize: "1vw" }}>Processeur</Link></li>
                                            <li ><Link to='/Refroidissement' className='nav-link w-100' style={{ fontSize: "1vw" }}>Refroidissement</Link></li>
                                            <li ><Link to='/Carte_Mere' className='nav-link w-100' style={{ fontSize: "1vw" }}>Carte Mere</Link></li>
                                            <li ><Link to='/Carte_Graphique' className='nav-link w-100' style={{ fontSize: "1vw" }}>Carte Graphique</Link></li>
                                            {/**  <li ><Link to='/Socket_Intel' className='nav-link w-100' style={{fontSize:"1vw"}}>Socket Intel</Link></li>
                                                <li ><Link to='/Socket_AMD' className='nav-link w-100' style={{fontSize:"1vw"}}>Socket AMD</Link></li>*/}
                                        </ul>
                                    </div>

                                    {/* <div className='col-6 col-sm-6 col-md-6 col-lg-6'>
                                            <ul style={{ listStyleType: "none" }} className='w-100'>
                                               <li style={{ color: "#0266FD",fontSize:"1.1vw" }} className='fw-bold ps-2 w-100'>Carte Mere</li> 
                                                <li ><Link to='/Carte_Mere' className='nav-link w-100' style={{fontSize:"1vw"}}>Carte Mere</Link></li>
                                               <li ><Link to='/CPU_Intel' className='nav-link w-100' style={{fontSize:"1vw"}}>CPU Intel</Link></li>
                                                <li ><Link to='/CPU_AMD' className='nav-link w-100' style={{fontSize:"1vw"}}>CPU AMD</Link></li>

                                            </ul>
                                        </div> */}

                                    {/* <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
                                            <ul style={{ listStyleType: "none" }} className='w-100'>
                                                <li style={{  color: "#0266FD",fontSize:"1.1vw" }} className='fw-bold ps-2 w-100'>Refroidissement</li>
                                               <li ><Link to='/Refroidissement' className='nav-link w-100' style={{fontSize:"1vw"}}>Refroidissement</Link></li>
                                                <li ><Link to='/Refroidissement_Processeur' className='nav-link w-100' style={{fontSize:"1vw"}}>Refroidissement Processeur</Link></li>
                                                <li ><Link to='/Ventilateur_Boitier' className='nav-link w-100' style={{fontSize:"1vw"}}>Ventilateur Boitier</Link></li>
                                                <li ><Link to='/Pate_thermique' className='nav-link w-100' style={{fontSize:"1vw"}}>Pate thermique</Link></li>
                                            </ul>
                                        </div> */}

                                    {/* <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
                                            <ul style={{ listStyleType: "none" }} className='w-100'>
                                               <li style={{ color: "#0266FD",fontSize:"1.1vw" }} className='fw-bold ps-2 w-100'>Carte Graphique</li>
                                               <li ><Link to='/Carte_Graphique' className='nav-link w-100'  style={{fontSize:"1vw"}}>Carte Graphique</Link></li>
                                                <li ><Link to='/GPU_NVIDIA' className='nav-link w-100'  style={{fontSize:"1vw"}}>GPU NVIDIA</Link></li>
                                                <li ><Link to='/GPU_AMD' className='nav-link w-100'  style={{fontSize:"1vw"}}>GPU AMD</Link></li>

                                            </ul>
                                        </div> */}

                                    <div className='col-6 col-sm-6 col-md-6 col-lg-6'>
                                        <ul style={{ listStyleType: "none" }} className='w-100 '>
                                            {/* {                                                <li style={{  color: "#0266FD",fontSize:"1.1vw"}} className='fw-bold ps-2 w-100'>Stockage</li> */}
                                            <li ><Link to='/Stockage' className='nav-link w-100' style={{ fontSize: "1vw" }}>Stockage</Link></li>
                                            <li ><Link to='/Alimentation_PC' className='nav-link w-100' style={{ fontSize: "1vw" }}>Alimentation PC</Link></li>
                                            <li ><Link to='/Boitier_Pc' className='nav-link w-100' style={{ fontSize: "1vw" }}>Boitier Pc</Link></li>
                                            <li ><Link to='/Memoire_vivre' className='nav-link w-100' style={{ fontSize: "1vw" }}>Memoire vivre</Link></li>
                                            {/* { <li ><Link to='/Disque_SSD' className='nav-link w-100' style={{fontSize:"1vw"}}>Disque SSD</Link></li>
                                                <li ><Link to='/Disque_HDD' className='nav-link w-100' style={{fontSize:"1vw"}}>Disque HDD</Link></li>
                                                <li ><Link to='/Disque_dur Externe' className='nav-link w-100' style={{fontSize:"1vw"}}>Disque dur Externe</Link></li>} */}

                                        </ul>
                                    </div>

                                    {/* <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
                                            <ul style={{ listStyleType: "none" }} className='w-100'>
                                                <li style={{ color: "#0266FD",fontSize:"1.1vw" }} className='fw-bold ps-2 w-100'>Alimentation PC</li>
                                                <li ><Link to='/Alimentation_PC' className='nav-link w-100' style={{fontSize:"1vw"}}>Alimentation PC</Link></li>

                                                <li ><Link to='/Moins_de_500W' className='nav-link w-100' style={{fontSize:"1vw"}}>Moins de 500W</Link></li>
                                                <li ><Link to='/Entre_500W_et_599W' className='nav-link w-100' style={{fontSize:"1vw"}}>Entre 500W et 599W</Link></li>
                                                <li ><Link to='/Entre_600W_et_699W' className='nav-link w-100' style={{fontSize:"1vw"}}>Entre  600W et 699W</Link></li>
                                                <li ><Link to='/Entre_700W_et_799W' className='nav-link w-100' style={{fontSize:"1vw"}}>Entre 700W et 799W</Link></li>
                                                <li ><Link to='/Entre_800W_et_899W' className='nav-link w-100' style={{fontSize:"1vw"}}>Entre 800W et 899W</Link></li>
                                                <li ><Link to='/Plus_de_900W' className='nav-link w-100' style={{fontSize:"1vw"}}>Plus de 900W</Link></li>
                                            </ul>
                                        </div> */}

                                    {/* <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
                                            <ul style={{  listStyleType: "none" }} className='w-100'>
                                                <li style={{ color: "#0266FD",fontSize:"1.1vw" }} className='fw-bold ps-2 w-100'>Boitier Pc</li>
                                                <li ><Link to='/Boitier_Pc' className='nav-link w-100' style={{fontSize:"1vw"}}>Boitier Pc</Link></li>

                                                <li ><Link to='/Full_tower' className='nav-link w-100' style={{fontSize:"1vw"}}>Full tower</Link></li>
                                                <li ><Link to='/mid_tower' className='nav-link w-100' style={{fontSize:"1vw"}}>mid tower</Link></li>
                                            </ul>
                                        </div> */}

                                    {/* <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
                                            <ul style={{  listStyleType: "none" }} className='w-100'>
                                                <li style={{ color: "#0266FD",fontSize:"1.1vw" }} className='fw-bold ps-2 w-100'>Memoire vivre</li>
                                                <li ><Link to='/Memoire_vivre' className='nav-link w-100' style={{fontSize:"1vw"}}>Memoire vivre</Link></li>
                                                <li ><Link to='/RAM_DDR4' className='nav-link w-100' style={{fontSize:"1vw"}}>RAM DDR4</Link></li>
                                                <li ><Link to='/RAM_DDR5' className='nav-link w-100' style={{fontSize:"1vw"}}>RAM DDR5</Link></li>
                                                <li ><Link to='/RAM_pour PC portable' className='nav-link w-100' style={{fontSize:"1vw"}}>RAM pour PC portable</Link></li>


                                            </ul>
                                        </div> */}

                                </div>
                            </ul>

                        </li>
                        {/*-----------perephiriques----------3 */}
                        <li className='nav-item dropdown  col-3 col-sm-3 col-md-3 col-lg-3'>
                            <a class="nav-link dropdown-toggle w-100" data-bs-toggle='dropdown'>
                                <span className='p-0 m-0 w-100' style={{ fontSize: "1.1vw" }}>Perephiriques</span>
                            </a>

                            <ul class="dropdown-menu nav2 border-0 p-3" style={{ width: '80%' }} >
                                <li ><Link to='/Clavier' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Clavier</Link></li>
                                <li ><Link to='/Souris' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Souris</Link></li>
                                <li ><Link to='/Tapis_de_souris' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Tapis de souris</Link></li>
                                <li ><Link to='/Accessoires_streaming' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Accessoires streaming</Link></li>
                                <li ><Link to='/Manettes' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Manettes</Link></li>
                                <li ><Link to='/Volant_PC' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Volant PC</Link></li>

                            </ul>

                        </li>
                        {/*----------image&son-----------4 */}
                        <li className='nav-item dropdown  col-3 col-sm-3 col-md-3 col-lg-3 '>
                            <a class="nav-link dropdown-toggle w-100" data-bs-toggle='dropdown'>
                                <span className='p-0 m-0 w-100' style={{ fontSize: "1.1vw" }}>Image & Son</span>
                            </a>

                            <ul class="dropdown-menu nav2 p-3 w-50 border-0" style={{ width: "100%" }} >
                                <li ><Link to='/Ecran' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Ecran</Link></li>
                                <li ><Link to='/Casque' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Casque</Link></li>
                                <li ><Link to='/Microphone' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Microphone</Link></li>
                                <li ><Link to='/Webcam' className='nav-link w-100' style={{ fontSize: "1.1vw" }}>Webcam</Link></li>


                            </ul>

                        </li>
                    </div>
                </ul>
            </nav>


        </div>
    )
}
export default Nav;
