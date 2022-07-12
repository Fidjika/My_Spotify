import { Outlet, Link } from "react-router-dom";
import '../styles/Home.css';
import logo from '../assets/logo.png';
import home from '../assets/home.png';
import book from '../assets/book.png';
import genre from '../assets/genre.png'

export default function Home() {
  return (
    <div className='nav'>
      <img src={logo} alt='Spotify' className='spotify-logo' />
      <h1 className="titre">Spotify</h1>

      <nav className="spotify-nav">
        <Link to="/expenses" className="home"><img src={home} alt="Logo" className='spotify-home' />Accueil</Link>
        <Link to="/invoices" className="search"><img src={book} alt="Search-Logo" className='spotify-search' />Bibliothèque</Link>
        <Link to="/genre" className="genre"><img src={genre} alt="Genre-Logo" className='spotify-genre' />Genre</Link>
      </nav>
      <Outlet />
    </div>
  );
}