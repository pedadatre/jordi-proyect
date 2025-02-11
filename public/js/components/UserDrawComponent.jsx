"use client"

import { useState } from "react"
import { motion } from "framer-motion"
import { MapPin, Calendar, Users } from "lucide-react"

const UserDrawComponent = ({ locations, year, rangeYears, userCrew }) => {
  const [selectedYear, setSelectedYear] = useState(year)
  const [hoveredLocation, setHoveredLocation] = useState(null)

  const handleYearChange = (e) => {
    const newYear = e.target.value
    setSelectedYear(newYear)
    window.location.href = `/user/position/${newYear}`
  }

  const userLocation = locations.find((location) => location.crew.id === userCrew?.id)

  // Función para obtener el color de la peña
  const getCrewColor = (location) => {
    if (!location || !location.crew) return "bg-gray-200"
    if (location.crew.id === userCrew?.id) {
      return "bg-green-500 hover:bg-green-400"
    } else {
    return "bg-pink-500 hover:bg-pink-400"}
  }

  return (
    <div className="min-h-screen bg-gradient-to-br from-purple-100 via-pink-100 to-rose-100">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
        className="container mx-auto px-4 py-8 max-w-6xl"
      >
        {/* Encabezado */}
        <div className="text-center mb-12">
          <motion.h1
            className="text-4xl font-bold text-fuchsia-600 mb-4"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ delay: 0.2 }}
          >
            Sorteo de Ubicaciones {year}
          </motion.h1>
          <motion.p
            className="text-fuchsia-500"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ delay: 0.3 }}
          >
            Consulta la ubicación de tu peña y todas las demás para el año seleccionado
          </motion.p>
        </div>

        {/* Información de la Peña del Usuario */}
        <motion.div
          className="bg-white rounded-2xl shadow-lg mb-8 overflow-hidden border-2 border-fuchsia-200"
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.4 }}
        >
          <div className="bg-gradient-to-r from-fuchsia-500 via-pink-500 to-rose-500 p-6 text-white">
            <div className="flex items-center gap-3">
              <Users className="w-6 h-6" />
              <h2 className="text-2xl font-semibold">Tu Peña</h2>
            </div>
          </div>
          <div className="p-6">
            {userLocation ? (
              <div className="grid md:grid-cols-2 gap-6">
                <div>
                  <h3 className="text-xl font-semibold text-fuchsia-600 mb-4">{userCrew.name}</h3>
                  <div className="flex items-center gap-2 text-fuchsia-500">
                    <MapPin className="w-5 h-5" />
                    <span>
                      Coordenadas: ({userLocation.x}, {userLocation.y})
                    </span>
                  </div>
                </div>
              </div>
            ) : (
              <p className="text-lg text-fuchsia-500">No se ha asignado una ubicación para tu peña este año.</p>
            )}
          </div>
        </motion.div>

        {/* Mapa de Ubicaciones */}
        <motion.div
          className="bg-white rounded-2xl shadow-lg mb-8 overflow-hidden border-2 border-fuchsia-200"
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.5 }}
        >
          <div className="bg-gradient-to-r from-fuchsia-500 via-pink-500 to-rose-500 p-6 text-white">
            <div className="flex items-center gap-3">
              <MapPin className="w-6 h-6" />
              <h2 className="text-2xl font-semibold">Mapa de Ubicaciones</h2>
            </div>
          </div>
          <div className="p-6">
            {locations.length === 0 ? (
              <p className="text-lg text-fuchsia-500 text-center">No hay ubicaciones disponibles para este año.</p>
            ) : (
              <div className="space-y-6">
                <div className="grid grid-cols-5 gap-3 bg-gradient-to-br from-fuchsia-100 to-pink-100 p-6 rounded-xl aspect-square max-w-3xl mx-auto">
                  {[...Array(5)].map((_, y) =>
                    [...Array(5)].map((_, x) => {
                      const location = locations.find((l) => l.x === x && l.y === y)
                      return (
                        <motion.div
                          key={`${x}-${y}`}
                          className={`relative rounded-lg ${getCrewColor(location)} transition-all duration-200 cursor-pointer shadow-md`}
                          initial={{ opacity: 0 }}
                          animate={{ opacity: 1 }}
                          transition={{ delay: (x + y) * 0.05 }}
                          onHoverStart={() => setHoveredLocation(location)}
                          onHoverEnd={() => setHoveredLocation(null)}
                          whileHover={{ scale: 1.1 }}
                        >
                          <div className="aspect-square flex items-center justify-center">
                            {location && (
                              <span className="text-white text-xs font-bold">{location.crew.name.substring(0, 2)}</span>
                            )}
                          </div>
                          {location && hoveredLocation?.crew.id === location.crew.id && (
                            <motion.div
                              className="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-fuchsia-600 text-white text-xs py-2 px-3 rounded-lg whitespace-nowrap z-10 shadow-lg"
                              initial={{ opacity: 0, y: 5 }}
                              animate={{ opacity: 1, y: 0 }}
                            >
                              {location.crew.name}
                            </motion.div>
                          )}
                        </motion.div>
                      )
                    }),
                  )}
                </div>

                {/* Leyenda */}
                <div className="flex justify-center gap-6">
                  <div className="flex items-center gap-2">
                    <div className="w-4 h-4 bg-green-500 rounded shadow-sm"></div>
                    <span className="text-sm text-fuchsia-600 font-medium">Tu Peña</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <div className="w-4 h-4 bg-pink-500 rounded shadow-sm"></div>
                    <span className="text-sm text-fuchsia-600 font-medium">Otras Peñas</span>
                  </div>
                </div>
              </div>
            )}
          </div>
        </motion.div>

        {/* Selector de Año */}
        <motion.div
          className="bg-white rounded-2xl shadow-lg border-2 border-fuchsia-200"
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.6 }}
        >
          <div className="bg-gradient-to-r from-fuchsia-500 via-pink-500 to-rose-500 p-6 text-white">
            <div className="flex items-center gap-3">
              <Calendar className="w-6 h-6" />
              <h2 className="text-2xl font-semibold">Seleccionar Año</h2>
            </div>
          </div>
          <div className="p-6">
            <select
              id="year"
              name="year"
              className="w-full px-4 py-2 rounded-lg border-2 border-fuchsia-200 focus:ring-2 focus:ring-fuchsia-500 focus:border-transparent transition-all duration-200 text-fuchsia-600"
              value={selectedYear}
              onChange={handleYearChange}
            >
              {rangeYears.map((year) => (
                <option key={year} value={year}>
                  {year}
                </option>
              ))}
            </select>
          </div>
        </motion.div>
      </motion.div>
    </div>
  )
}

export default UserDrawComponent

