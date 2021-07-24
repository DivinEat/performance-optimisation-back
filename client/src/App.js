import "./App.css";
import {BrowserRouter, Route} from "react-router-dom";
import Header from "./components/Header";
import Login from "./components/Login";
import Home from "./components/Home";

function App() {
  return (
      <div className="App">
        <header className="App-header">
          <BrowserRouter>
            <Route path="/" exact>
              <Header/>
              <Home/>
            </Route>

            <Route path="/all" exact>
              <Header/>
            </Route>
            <Route path="/login" exact>
              <Header/>
              <Login/>
            </Route>
          </BrowserRouter>
        </header>
      </div>
  );
}

export default App;