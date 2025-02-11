import { motion } from "framer-motion"

const WelcomePage = () => {
  return (
    <div className="min-h-screen bg-gradient-to-br from-purple-400 via-pink-500 to-red-500 flex items-center justify-center">
      <motion.div
        initial={{ opacity: 0, y: -50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8 }}
        className="bg-white p-8 rounded-lg shadow-2xl max-w-md w-full"
      >
        <motion.h1
          className="text-4xl font-bold text-gray-800 mb-6 text-center"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 0.3 }}
        >
          
          Bienvenido a Mi Aplicación
        </motion.h1>
        <motion.p
          className="text-gray-600 mb-8 text-center"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 0.5 }}
        >
          Esta es una hermosa página de bienvenida creada con React y Tailwind CSS.
        </motion.p>
        <motion.div
          className="flex justify-center"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 0.7 }}
        >
          <button className="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-2 px-4 rounded-full hover:from-pink-500 hover:to-purple-500 transition duration-300">
            Comenzar
          </button>
        </motion.div>
      </motion.div>
    </div>
  )
}

export default WelcomePage

