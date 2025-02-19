import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import { RouterProvider } from 'react-router-dom'
import { router } from './Routes/Router.jsx'
import AxiosProvider from './hooks/AxiosProvider.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <AxiosProvider>
      <RouterProvider router={router}></RouterProvider>
    </AxiosProvider>
  </StrictMode>,
)
