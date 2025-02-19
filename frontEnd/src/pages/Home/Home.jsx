
import React, { useEffect, useState } from 'react';
import { useAxios } from '../../hooks/AxiosProvider';

const Home = () => {
    const [doctors, setDoctors] = useState([]);
    const axiosInstant = useAxios();

    const fetchDoctorData = async () => {
        try {
            const res = await axiosInstant.get('doctors');
            console.log(res?.data);
            setDoctors(res?.data);
        }
        catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    useEffect(() => {
        fetchDoctorData();
    }, [])

    return (
        <div>
            <h2 className='text-4xl text-green-600 text-center'>Show Home</h2>
            <div className="overflow-x-auto">
                <table className="table text-center">
                    {/* head */}
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Specialty</th>
                        </tr>
                    </thead>
                    <tbody>
                        {
                            doctors.map((doctor) => (<tr key={doctor?.id} doctor={doctor}>
                                <td>{doctor?.id}</td>
                                <td>{doctor?.name}</td>
                                <td>{doctor?.email}</td>
                                <td>{doctor?.password}</td>
                                <td>{doctor?.phone}</td>
                                <td>{doctor?.spciality}</td>
                            </tr>))
                        }
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default Home;