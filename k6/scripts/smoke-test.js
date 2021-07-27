import http from 'k6/http';
import { check, sleep } from 'k6';

export let options = {
    vus: 1,
    duration: '10s',

    thresholds: {
        http_req_duration: ['p(99)<1500'], // 99% of requests must complete below 1.5s
    },
};

const BASE_URL = 'http://localhost:8000';
// const USERNAME = 'TestUser';
// const PASSWORD = 'SuperCroc2020';

export default () => {
    // let loginRes = http.post(`${BASE_URL}/auth/token/login/`, {
    //     username: USERNAME,
    //     password: PASSWORD,
    // });

    // check(loginRes, {
    //     'logged in successfully': (resp) => resp.json('access') !== '',
    // });
    //
    // let authHeaders = {
    //     headers: {
    //         Authorization: `Bearer ${loginRes.json('access')}`,
    //     },
    // };

    // let myObjects = http.get(`${BASE_URL}/my/crocodiles/`, authHeaders).json();
    let myObjects = http.get(`${BASE_URL}/api/allocations-vs-rdv`).json();
    check(myObjects, { "allocationsVsRdv" : (obj) => {
        return obj.allocationsVsRdv.length !== 0;
    }});

    sleep(1);
};
