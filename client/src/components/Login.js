import LoginForm from "./LoginForm";

export default function Login() {
    const login = () =>{
        console.log('login');
    }

    return (
        <>
            <LoginForm onSubmit={login}/>
        </>
    );
}
