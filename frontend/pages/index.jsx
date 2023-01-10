import App from './App'
import { useEffect } from 'react'

export default() => {
  useEffect(() => {
    if (typeof window !== undefined) {
      const bootstrapJs = require('bootstrap/dist/js/bootstrap.bundle.min.js')
      const bootstrapCss = require('bootstrap/dist/css/bootstrap.min.css')
    }
  })

  return <App/>
}