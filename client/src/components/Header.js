import React from "react";
import {Link} from "react-router-dom";

function Header() {
    return (
        <nav>
            <h1>TEST DE PERF</h1>

            <div>
                <Link to="/Home">Home</Link>
                <Link to="/Login">Login</Link>
                <Link to="/">X</Link>
            </div>
        </nav>
    );
}

export default Header;