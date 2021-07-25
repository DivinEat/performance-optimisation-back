import React, { useState, useEffect } from "react";

export default function Home() {
  const [values, setValues] = useState([]);

  useEffect(() => {
    const headers = new Headers({
      "Access-Control-Allow-Origin": "*",
    });

    fetch("http://localhost:8000/api/allocations-vs-rdv/", {
      method: "GET",
        // headers: headers,
    })
      .then((res) => res.json())
      .then((result) => {
        console.log("ok");
        console.log(result);
        setValues(result);
      })
      .catch((error) => {
        console.log(error);
      });
  }, []);

  return (
    <>
      <h1>Home</h1>
    </>
  );
}
