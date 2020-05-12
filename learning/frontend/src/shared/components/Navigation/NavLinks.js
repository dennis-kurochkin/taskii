import React from 'react';
import { NavLink } from 'react-router-dom';

const NavLinks = () => {
    return (
        <ul className="nav-links">
            <li>
                <NavLink to="/" exact>All users</NavLink>
            </li>
            <li>
                <NavLink to="/u1/places">My places</NavLink>
            </li>
            <li>
                <NavLink to="/places/new">Add place</NavLink>
            </li>
            <li>
                <NavLink to="/auth">Log in</NavLink>
            </li>
        </ul>
    );
}

export default NavLinks;