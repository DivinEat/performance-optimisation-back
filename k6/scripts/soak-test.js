import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '2m', target: 150 }, // ramp up to 150 users
        { duration: '2m', target: 0 }, // scale down. (optional)
    ],
};

const API_BASE_URL = 'http://localhost:8000';

export default function () {
    http.batch([
        ['GET', `${API_BASE_URL}/api/all`],
        ['GET', `${API_BASE_URL}/api/flux-total-nat`],
        ['GET', `${API_BASE_URL}/api/allocations-vs-rdv`],
        ['GET', `${API_BASE_URL}/api/stocks-plateformes`],
    ]);

    sleep(1);
}
