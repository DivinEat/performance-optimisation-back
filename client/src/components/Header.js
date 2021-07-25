import React from "react";
import {Link} from "react-router-dom";

function Header() {
    return (
        <nav>
            <h1>TEST DE PERF</h1>

            <div>
                <Link to="/">Home</Link>
                <Link to="/all">All</Link>
                <Link to="/login">Login</Link>
            </div>
        </nav>
    );
}

export default Header;