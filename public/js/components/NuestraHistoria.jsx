"use client"

import { useEffect, useRef } from "react"
import { motion, useAnimation, useInView } from "framer-motion"
import { Spotlight } from "./Spotlight"
import { Card } from "./Card"
import { SplineScene } from "./SplineScene"

const HistoryEvent = ({ year, title, description, delay }) => {
  const controls = useAnimation()
  const ref = useRef(null)
  const inView = useInView(ref)

  useEffect(() => {
    if (inView) {
      controls.start({ opacity: 1, y: 0 })
    }
  }, [controls, inView])

  return (
    <motion.div ref={ref} initial={{ opacity: 0, y: 50 }} animate={controls} transition={{ duration: 0.5, delay }}>
      <Card className="bg-white/10 backdrop-blur-md border-none text-white mb-6">
        <Card.Header>
          <Card.Title className="text-2xl font-bold">{year}</Card.Title>
        </Card.Header>
        <Card.Content>
          <h3 className="text-xl font-semibold mb-2">{title}</h3>
          <p>{description}</p>
        </Card.Content>
      </Card>
    </motion.div>
  )
}

const NuestraHistoria = () => {
  return (
    <div className="min-h-screen bg-gradient-to-br from-purple-900 via-indigo-800 to-blue-900 text-white py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
      <Spotlight className="-top-40 left-0 md:left-60 md:-top-20" fill="white" />

      <motion.h1
        className="text-5xl md:text-7xl font-bold text-center mb-12"
        initial={{ opacity: 0, y: -50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8, delay: 0.2 }}
      >
        Nuestra Historia
      </motion.h1>

      <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
        <div className="space-y-8">
          <HistoryEvent
            year="1950"
            title="Fundación"
            description="Nuestra peña fue fundada por un grupo de amigos apasionados por la cultura local."
            delay={0.4}
          />
          <HistoryEvent
            year="1975"
            title="Expansión"
            description="Nos mudamos a un local más grande y comenzamos a organizar eventos culturales para toda la comunidad."
            delay={0.6}
          />
          <HistoryEvent
            year="2000"
            title="Modernización"
            description="Implementamos nuevas tecnologías para mejorar nuestras actividades y alcance."
            delay={0.8}
          />
          <HistoryEvent
            year="2025"
            title="Futuro"
            description="Continuamos creciendo y adaptándonos, manteniendo vivas nuestras tradiciones para las generaciones futuras."
            delay={1}
          />
        </div>
        <div className="relative h-[600px] mt-8 md:mt-0">
          <Card className="w-full h-full bg-black/[0.7] relative overflow-hidden">
            <SplineScene
              scene="/assets/scene.splinecode"
              className="w-full h-full"
            />
          </Card>
        </div>
      </div>
    </div>
  )
}

export default NuestraHistoria