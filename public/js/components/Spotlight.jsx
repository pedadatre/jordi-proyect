"use client"
import { useRef, useState, useCallback, useEffect } from "react"
import { motion, useSpring, useTransform } from "framer-motion"

export function Spotlight({ className, size = 200 }) {
  const containerRef = useRef(null)
  const [isHovered, setIsHovered] = useState(false)
  const [parentElement, setParentElement] = useState(null)

  const mouseX = useSpring(0)
  const mouseY = useSpring(0)

  const spotlightLeft = useTransform(mouseX, (x) => `${x - size / 2}px`)
  const spotlightTop = useTransform(mouseY, (y) => `${y - size / 2}px`)

  useEffect(() => {
    if (containerRef.current) {
      const parent = containerRef.current.parentElement
      if (parent) {
        parent.style.position = "relative"
        parent.style.overflow = "hidden"
        setParentElement(parent)
      }
    }
  }, [])

  const handleMouseMove = useCallback(
    (event) => {
      if (!parentElement) return
      const { left, top } = parentElement.getBoundingClientRect()
      mouseX.set(event.clientX - left)
      mouseY.set(event.clientY - top)
    },
    [mouseX, mouseY, parentElement],
  )

  useEffect(() => {
    if (!parentElement) return

    parentElement.addEventListener("mousemove", handleMouseMove)
    parentElement.addEventListener("mouseenter", () => setIsHovered(true))
    parentElement.addEventListener("mouseleave", () => setIsHovered(false))

    return () => {
      parentElement.removeEventListener("mousemove", handleMouseMove)
      parentElement.removeEventListener("mouseenter", () => setIsHovered(true))
      parentElement.removeEventListener("mouseleave", () => setIsHovered(false))
    }
  }, [parentElement, handleMouseMove])

  return (
    <motion.div
      ref={containerRef}
      className={`pointer-events-none absolute rounded-full bg-[radial-gradient(circle_at_center,var(--tw-gradient-stops),transparent_80%)] blur-xl transition-opacity duration-200 from-purple-300 via-purple-200 to-purple-300 ${
        isHovered ? "opacity-100" : "opacity-0"
      } ${className}`}
      style={{
        width: size,
        height: size,
        left: spotlightLeft,
        top: spotlightTop,
      }}
    />
  )
}

