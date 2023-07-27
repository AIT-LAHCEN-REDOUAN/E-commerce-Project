import React, { useEffect, useState } from 'react'
import Nav from './Sections/Nav'
import Footer from './Sections/Footer'
import CreationCompte from './NavComponent/CreationCompte';
import Contacter from './NavComponent/Contacter';
import Accueil from './Sections/Accueil'
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import MotDePassPerdu from './NavComponent/MotDePassPerdu';
import PC_Portable_Gamer from './Sections/Produits/Pc_Portable/PC_Portable_Gamer';
import PC_Portable_Multimédia from './Sections/Produits/Pc_Portable/PC_Portable_Multimédia';
import Sac_Ordinateur_Portable from './Sections/Produits/Pc_Portable/Sac_Ordinateur_Portable';
import Accessoires_streaming from './Sections/Produits/Perephiriques/Accessoires_streaming';
import Clavier from './Sections/Produits/Perephiriques/Clavier';
import Souris from './Sections/Produits/Perephiriques/Manettes';
import Manettes from './Sections/Produits/Perephiriques/Manettes';
import Tapis_de_souris from './Sections/Produits/Perephiriques/Tapis_de_souris';
import Volant_PC from './Sections/Produits/Perephiriques/Volant_PC';
import Ecran from './Sections/Produits/Image & Son/Ecran';
import Casque from './Sections/Produits/Image & Son/Casque';
import Microphone from './Sections/Produits/Image & Son/Microphone';
import Webcam from './Sections/Produits/Image & Son/Webcam';
import Alimentation_PC from './Sections/Produits/Composants/Alimentation_PC';
import Boitier_Pc from './Sections/Produits/Composants/Boitier_Pc';
import Carte_Mere from './Sections/Produits/Composants/Carte_Mere';
import Memoire_vivre from './Sections/Produits/Composants/Memoire_vivre';
import Processeur from './Sections/Produits/Composants/Processeur';
import Refroidissement from './Sections/Produits/Composants/Refroidissement';
import Stockage from './Sections/Produits/Composants/Stockage';
import Carte_Graphique from './Sections/Produits/Composants/Carte_Graphique';
import Profile from './Sections/Profile';
import Panier from './Sections/Panier';
import Product_deatil from './Sections/Produits/Product_deatil';
import Checkout from './Sections/Checkout';
import Test from './Sections/Test';
import Login from './NavComponent/Login';
function App() {
   
  return (
    <div>

    <BrowserRouter>
      <Nav />
      <Routes>
        <Route path='/' element={<Accueil />} />
        <Route path='/Login' element={<Login />} />
        <Route path='/CreationCompte' element={<CreationCompte />} />
        <Route path='/Contacter' element={<Contacter />} />
        <Route path='/MotDePassPerdu' element={<MotDePassPerdu />} />
        {/*PC PORTABLE*/}
        <Route path='/PC_Portable_Gamer' element={<PC_Portable_Gamer />} />
        <Route path='/PC_Portable_Multimédia' element={<PC_Portable_Multimédia/>} />
        <Route path='/Sac_Ordinateur_Portable' element={<Sac_Ordinateur_Portable/>} />
        {/* PC PEREPHIRIQUE */}
        <Route path='/Accessoires_streaming' element={<Accessoires_streaming/>} />
        <Route path='/Clavier' element={<Clavier/>} />
        <Route path='/Manettes' element={<Manettes/>} />
        <Route path='/Souris' element={<Souris/>} />
        <Route path='/Tapis_de_souris' element={<Tapis_de_souris/>} />
        <Route path='/Volant_PC' element={<Volant_PC/>} />
        {/* IMAGE && SON */}
        <Route path='/Casque' element={<Casque/>} />
        <Route path='/Ecran' element={<Ecran/>} />
        <Route path='/Microphone' element={<Microphone/>} />
        <Route path='/Webcam' element={<Webcam/>} />
        {/* COMPOSANSTS */}
        <Route path='/Alimentation_PC' element={<Alimentation_PC/>} />
        <Route path='/Boitier_Pc' element={<Boitier_Pc/>} />
        <Route path='/Carte_Mere' element={<Carte_Mere/>} />
        <Route path='/Memoire_vivre' element={<Memoire_vivre/>} />
        <Route path='/Processeur' element={<Processeur/>} />
        <Route path='/Refroidissement' element={<Refroidissement/>} />
        <Route path='/Stockage' element={<Stockage/>} />
        <Route path='/Carte_Graphique' element={<Carte_Graphique/>} />

        {/* Profile */}
        <Route path='/profile' element={<Profile/>}></Route>

        {/*Panier */}
        <Route path='/Panier' element={<Panier/>}/>
      

        {/*product detail */}
      <Route path='/Product_deatil/:id' element={<Product_deatil/>}/>


        {/*Checkout */}
        <Route path='/Checkout' element={<Checkout/>}/>
        <Route path='/images' element={<Test/>}/>
      </Routes>
      <Footer />
    </BrowserRouter>
  </div>
  )
}


export default App
