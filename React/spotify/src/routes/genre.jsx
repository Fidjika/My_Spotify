import {
  NavLink,
  Outlet,
  useSearchParams,
} from "react-router-dom";
import { getInvoices } from "../data";
import loupe from '../assets/loupe-noir.png'
import '../styles/Search.css'

export default function Genre() {
  let invoices = getInvoices();
  let [searchParams, setSearchParams] = useSearchParams();

  return (
    <div className="searchbar">
      <nav className="search_1">
        <img src={loupe} alt="Recherche-logo" className='spotify_search-logo' />
          <input className="searchbar_style" 
            value={searchParams.get("filter") || ""}
            onChange={(event) => {
              let filter = event.target.value;
              if (filter) {
                setSearchParams({ filter });
              } else {
                setSearchParams({});
              }
            }}
          />
          {invoices
            .filter((invoice) => {
              let filter = searchParams.get("filter");
              if (!filter) return true;
              let name = invoice.album.genre.toLowerCase();
              return name.startsWith(filter.toLowerCase());
            })
            .map((invoice) => (
              <NavLink className="album"
                to={`/invoices/${invoice.album.genre}`}
                key={invoice.album.photo}
              >
                {invoice.album.name} <br />
                {invoice.album.genre} <br />
              </NavLink>
            ))}
      </nav>
      <Outlet />
    </div>
  );
}