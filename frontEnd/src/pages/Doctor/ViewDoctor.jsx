import React, { useEffect, useState } from 'react';
import { Link, useParams } from 'react-router-dom';
import { useAxios } from '../../hooks/AxiosProvider';

const ViewDoctor = () => {
    const { id } = useParams();
    const [doctor, setDoctor] = useState({});
    const axiosInstant = useAxios();

    const fetchDoctorData = async () => {
        try {
            const res = await axiosInstant.get(`doctors/${id}`)
            // console.log(res?.data);
            setDoctor(res?.data);
        }
        catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    useEffect(() => {
        fetchDoctorData();
    }, [])

    return (
        <div className="flex justify-center items-center py-10 px-4 bg-gray-100 min-h-screen">
            <div className="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 space-y-6">
                <div className="text-center">
                    <h2 className="text-3xl font-semibold text-gray-800">{doctor?.name}</h2>
                    <p className="text-lg text-gray-600 mt-2">{doctor?.speciality}</p>
                </div>
                <div className="space-y-4">
                    <div className="flex justify-between text-gray-700">
                        <strong>Email:</strong>
                        <span className="text-gray-500">{doctor?.email}</span>
                    </div>
                    <div className="flex justify-between text-gray-700">
                        <strong>Phone:</strong>
                        <span className="text-gray-500">{doctor?.phone}</span>
                    </div>
                    <div className="flex justify-between text-gray-700">
                        <strong>Password:</strong>
                        <span className="text-gray-500">{doctor?.password}</span>
                    </div>
                    <div className="flex justify-between text-gray-700">
                        <strong>speciality:</strong>
                        <span className="text-gray-500">{doctor?.speciality}</span>
                    </div>
                </div>
                <div className='text-center rounded-md'>
                    <Link to='/' className='px-8 py-3 bg-blue-600 text-white '>Go Home</Link>
                </div>
            </div>
        </div>
    );
};

export default ViewDoctor;
