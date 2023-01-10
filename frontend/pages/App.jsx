import { useState, useEffect } from 'react'
import IntroPage from './InfoPage';
import Navbar from './Navbar';
import Head from 'next/head'


const App = ({ initialData }) => {
  if (initialData === undefined) {
    initialData = []
  }

  const [data, setData] = useState(initialData)

  const fetchData = async () => {
    const req = await fetch('http://localhost:8080/rest/army', {
      headers: {'Access-Control-Allow-Origin': '*'}
    })
    const data = await req.json()

    return setData(data.results)
  }

  const handleClick = (event) => {
    event.preventDefault()
    fetchData()
  }

  return (
    <div>
      <Head>
        <title>Army Composer</title>
      </Head>
      <Navbar/>
      <IntroPage />
      <button onClick={handleClick} className='btn btn-primary'>Get armies</button>
      <ul>
        {data.map((army) => (
          <li key={army.id}>{army.name}</li>
        ))}
      </ul>
    </div>
  )
}

App.getInitialProps = async () => {
  const req = await fetch('http://localhost:8080/rest/army', {headers: {'Access-Control-Allow-Origin': '*'}})
  const data = await req.json()

  return setData(data.results)
}

export default App